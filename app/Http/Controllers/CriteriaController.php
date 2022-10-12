<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Parameter;
use App\Models\Weight;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function show()
    {
        $queryResult = Criteria::join('parameters', 'parameters.criteria_id', '=', 'criterias.id')
                            ->get();
        $dataForUi = [];
        foreach ($queryResult as $q) {
			$dataFoundBefore = false;
            for ($i=0; $i < count($dataForUi); $i++) { 
                if ($dataForUi[$i]['name'] == $q->name) {
                   array_push($dataForUi[$i]['fuzzy'], $q->fuzzy);
                   array_push($dataForUi[$i]['description'], $q->description);
				   $dataFoundBefore = true;
                   break;
                }
            }
			if ($dataFoundBefore == false) {
				$newData = [];
                   $newData['id'] = $q->criteria_id;
                    $newData['name'] = $q->name;
                    $newData['type'] = $q->type;
                    $newData['fuzzy'] = array($q->fuzzy);
                    $newData['description'] = array($q->description);
                    $newData['weighted'] = $q->weighted;
                    array_push($dataForUi, $newData);  
			}
        }
        return view('criteria.show', ['criterias' => $dataForUi]);
    }

    public function create()
    {
        return view('criteria.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required', 'unique:criterias', 'string',
            'type' => 'required',
            'weighted' => 'required', 'numeric',
        ]);

        Criteria::create($attr);
        return redirect(route('create.fuzzy'));
    }

    public function createFuzzy()
    {
        $criterias = Criteria::all();
        return view('criteria.fuzzy.create', compact('criterias'));
    }

    public function storeFuzzy(Request $request)
    {
        $request->validate([
            'criteria' => ['required'],
            'fuzzy' => ['required', 'numeric', 'min:10', 'max:50'],
            'description' => ['required','string'],
        ]);
        Parameter::create([
            'criteria_id' => $request->criteria,
            'fuzzy' => $request->fuzzy,
            'description' => $request->description,
        ]);
        session()->flash('success');
        return redirect(route('create.fuzzy'));
    }

    public function edit($id)
    {
        $criteria = Criteria::where('id',$id)->with('parameters')->first();
        // dd($criteria);
        return view('criteria.edit', compact('criteria'));
    }

    public function update(Request $request, $id)
    {
        $attr = $request->validate([
            'name' => ['required', 'string'],
            'type' => ['required'],
            'weighted' => ['required', 'numeric'],

        ]);

        Criteria::where('id', $id)->update($attr);
        session()->flash('successUpdate');
        return redirect(route('show.criteria'));
    }

    public function destroy($id)
    {
        Criteria::where('id', $id)->delete();
        session()->flash('successDelete');
        return redirect(route('show.criteria'));
    }

    public function editFuzzy($id)
    {
        $parameter = Parameter::where('id', $id)->first();
        return view('criteria.fuzzy.edit', compact('parameter'));
    }

    public function updateFuzzy(Request $request, $id)
    {
        $attr = $request->validate([
            'fuzzy' => ['required', 'numeric', 'min:10', 'max:50'],
            'description' => ['required','string'],
        ]);
        Parameter::where('id', $id)->update($attr);
        session()->flash('successUpdate');
        return redirect(route('show.criteria'));
    }

    public function destroyFuzzy($id)
    {
        Parameter::where('id', $id)->delete();
        session()->flash('successDelete');
        return redirect(route('show.criteria'));
    }

}
