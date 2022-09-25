<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function show()
    {
        $students = Student::paginate(5);
        return view('student.show', compact('students'));
    }

    public function register()
    {
        return view('register');
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(StudentRequest $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store("images/student");
        }else {
            $photo = null;
        }
        $attr = $request->all();
        $attr['photo'] = $photo;
        Student::create($attr);
        session()->flash('successDaftar');
        if (Auth::check()) {
            return redirect(route('show.santri'));
        }else{
            return back();
        }
        
    }

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    public function update(StudentRequest $request, Student $student)
    {
        
        if (request()->hasFile('photo')) {
            \Storage::delete($student->photo);
            $photo = request()->file('photo')->store("images/student");
        }else{
            $photo = $student->photo;
        }
        $attr = $request->all();
        $attr['photo'] = $photo;
        $student->update($attr);

        session()->flash('successUpdate');
        return redirect(route('show.santri'));
    }

    public function destroy(Student $student)
    {
        $photo = Student::find($student->id)->photo;
        if ($photo!=null) {
        \Storage::delete($photo);
        }
        Student::where('id',$student->id)->delete();
        session()->flash('successDelete');
        return redirect(route('show.santri'));
    }
}
