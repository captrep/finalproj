<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use App\Models\Criteria;
use App\Models\Parameter;
use App\Models\Result;
use App\Models\Student;
use App\Models\Weight;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AssesmentController extends Controller
{
    public function show()
    {
        $queryResult = Assesment::with('student','parameter','criteria')->get();
        $dataForUi = [];
        $pembagi = [];
        $normalisasi = [];
        $optimasi = [];
        $max = [];
        $min = [];

        foreach ($queryResult as $q) {  
			$dataFoundBefore = false;
            for ($i=0; $i < count($dataForUi); $i++) { 
                if ($dataForUi[$i]['student'] == $q->student->name) {
                   array_push($dataForUi[$i]['criteria'], $q->criteria->name);
                   array_push($dataForUi[$i]['score'], $q->parameter->fuzzy);
                   array_push($dataForUi[$i]['type'], $q->criteria->type);
                   array_push($dataForUi[$i]['weighted'], $q->criteria->weighted);
					$dataFoundBefore = true;
                   break;
                }
            }
			if ($dataFoundBefore == false) {
				   $newData = [];
                    $newData['id'] = $q->id;
                    $newData['student'] = $q->student->name;
                    $newData['student_id'] = $q->student_id;
                    $newData['type'] = array($q->criteria->type);
                    $newData['criteria'] = array($q->criteria->name);
                    $newData['weighted'] = array($q->criteria->weighted);
                    $newData['score'] = array($q->parameter->fuzzy);
                    array_push($dataForUi, $newData);  
			}
        }

        // pangkat 2 pembagi
        foreach ($dataForUi as $key => $value) {
            foreach ($value['score'] as $k => $val) {
                $pembagi[$k][$key] = pow($val, 2);
            }
        }

        // normalisasi
        foreach ($dataForUi as $key => $value) {
            foreach ($value['score'] as $k => $val) {
                    $normalisasi[$key]['student'] = $value['student'];
                    $normalisasi[$key]['student_id'] = $value['student_id'];
                    $normalisasi[$key]['type'] = $value['type'];
                    $normalisasi[$key]['weighted'] = $value['weighted'];
                    $normalisasi[$key]['results'][$k] = $val / sqrt(array_sum($pembagi[$k]));
            }
        }
        
        // optimasi
        foreach ($normalisasi as $key => $value) {
            foreach ($value['results'] as $k => $val) {
                $optimasi[$key]['student'] = $value['student'];
                $optimasi[$key]['student_id'] = $value['student_id'];
                if ($value['type'][$k] == 'Benefit') {
                    $max[$k] = $val * $value['weighted'][$k];
                    $optimasi[$key]['results'][$k] = $max[$k];
                }else{
                    $min[$k] = $val * $value['weighted'][$k];
                    $optimasi[$key]['results'][$k] = $min[$k];
                }
            }
            if ($min == null) {
                $optimasi[$key]['total'] = array_sum($max);
            }else{
                $optimasi[$key]['total'] = array_sum($max)-array_sum($min);
            }
        }
        return view('assesment.show', ['dataForUi' => $dataForUi, 
                                       'normalisasi' => $normalisasi, 
                                       'optimasi' => $optimasi]);
    }

    public function storeResults(Request $request)
    {
        // dd($this->show()->optimasi);
        $request->validate([
            'name' => 'required'
        ]);
        
        foreach ($this->show()->optimasi as $key => $value) {
            Result::create([
                'name' => $request->name,
                'student_id' => $value['student_id'],
                'result' =>  $value['total'],
            ]);
            Assesment::where('student_id', $value['student_id'])->delete();
        }
        session()->flash('success');
        return redirect(route('choose.results'));

    }

    public function create()
    {
        $students = Student::doesnthave('assesments')->get();
        $criterias = Criteria::with('parameters')->get();
        return view('assesment.create', compact('students', 'criterias'));

    }

    public function store(Request $request)
    {
        $req = $request->except('_token','student');
        $student = $request->student;
        foreach ($request->except('_token') as $key => $item) {
            $rule[$key] = 'required';
        }
        $validator = Validator::make($request->all(),$rule);
        if ($validator->fails()) {
            return redirect(route('create.assesment'))->withErrors($validator);
        }
        foreach ($req as $key => $request) {
            $key = str_replace("_"," ", $key);
            $criteria =Criteria::where('name', $key)->pluck('id')->first();
            Assesment::create([
                'student_id' => $student,
                'criteria_id' => $criteria,
                'parameter_id' => $request
            ]);
        }
        session()->flash('successDaftar');
        return redirect(route('create.assesment'));
    }

    public function destroy($id)
    {
        Assesment::where('student_id', $id)->delete();
        session()->flash('successDelete');
        return redirect(route('show.assesment'));
    }

    public function edit($id)
    {
        $assesment = Assesment::where('student_id', $id)->with('student','criteria','parameter')->get();
        $criterias = Criteria::with('parameters')->get();
        if (count($assesment) == 0) {
            abort(404);
        }else{
            return view('assesment.edit', compact('assesment','criterias'));
        }
        
    }

    public function update(Request $request, $id)
    {
        $hah = $request->except('_method','_token','name');
        foreach ($hah as $key => $request) {
            Assesment::where('student_id', $id)->where('criteria_id', $key)->update(['parameter_id' => $request]);
        }
        session()->flash('successUpdate');
        return redirect(route('show.assesment'));
    }

}
