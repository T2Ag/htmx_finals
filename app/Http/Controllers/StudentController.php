<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        $students = Student::orderBy('first_name')->get();

        return view('templates._students-list',['students'=>$students]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' =>'required',
            'last_name' =>'required',
            'birth_date' =>'required',
            'address' =>'required'
        ]);

        if($validator->fails()) {
            $students = Student::orderBy('first_name');
            return view('templates._students-error', ['errors' => $validator->errors(), 'students' => $students]);

        };

        Student::create($request->all());

        $students = Student::orderBy('first_name')->get();

        return view('templates._students-list',['students'=>$students]);
    }

    public function edit(Student $student) {
        
        $stud = Student::find($student->id);

        return view('student.edit', ['student' => $stud]);
    }

    public function update(Request $request, Student $student) {
        $fields = $request->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'birth_date' =>'required',
            'address' =>'required'
        ]);

        $student->update($fields);

        
        $students = Student::orderBy('first_name')->get();

        return view('templates._students-list',['students'=>$students]);
    }

    public function destroy(Student $student) {

        $student->delete();

        $students = Student::orderBy('first_name')->get();

        return view('templates._students-list',['students'=>$students]);
    }
}
