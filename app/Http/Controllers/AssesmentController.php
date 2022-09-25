<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use App\Models\Criteria;
use App\Models\Parameter;
use App\Models\Student;
use App\Models\Weight;
use Illuminate\Http\Request;

class AssesmentController extends Controller
{
    public function show()
    {
        $queryResult = Assesment::with('student','parameter','criteria')->get();
        $criterias = Criteria::all();
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
        // dd($dataForUi);

        // pangkat 2 pembagi
        foreach ($dataForUi as $key => $value) {
            foreach ($value['score'] as $k => $val) {
                $pembagi[$k][$key] = pow($val, 2);
            }
        }

        
        // dd($dataForUi);
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

        
        foreach ($normalisasi as $key => $value) {
            foreach ($value['results'] as $k => $val) {
                $optimasi[$key]['student'] = $value['student'];
                if ($value['type'][$k] == 'Benefit') {
                    $max[$k] = $val * $value['weighted'][$k];
                    $optimasi[$key]['hasil'][$k] = $max[$k];
                }else{
                    $min[$k] = $val * $value['weighted'][$k];
                    // $weights[$k]['weighted'];
                    $optimasi[$key]['hasil'][$k] = $min[$k];
                }
            }
            
            $optimasi[$key]['total'] = array_sum($max)-array_sum($min);
            // $result = Result::where('student_id', $value['student_id'])->first();
            // if (!$result) {
            //     Result::create([
            //         'student_id' => $value['student_id'],
            //         'result' =>  $matriksV[$key]['total'],
            //     ]);
            // }
        }
        dd($normalisasi,$optimasi);
        // dd($optimasi);
        return view('assesment.show', compact('dataForUi', 'criterias'));
    }

    public function create()
    {
        $students = Student::doesnthave('assesment')->get();
        // dd($students);
        $criterias = Criteria::with('parameters')->get();
        return view('assesment.create', compact('students', 'criterias'));

    }

    public function store(Request $request)
    {
        $test = $request->except('_token','student');
        $request->validate([
            'student' => 'required',
        ]);
        $student = $request->student;
        foreach ($test as $key => $request) {
            Assesment::create([
                'student_id' => $student,
                'criteria_id' => $key,
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

}
