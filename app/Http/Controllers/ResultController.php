<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show()
    {
        $names = Result::select('name')->distinct()->get();
        $results = null;
        return view('assesment.results', compact('names', 'results'));
    }

    public function results($name)
    {
        $results = Result::where('name', $name)->get()->sortByDesc('result');
        $names = $this->show()->names;
        if (count($results) == 0) {
            abort(404);
        }else{
            return view('assesment.results', compact('names','results'));
        }
        
    }
}
