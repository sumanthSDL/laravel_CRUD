<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $all_students = Student::get();
        return view('welcome', compact('all_students'));
    }
    public function store(Request $data){
        // dd($data->input());
        // echo $data->name;
        $data->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $student = new Student;
        $student->name = $data->name;
        $student->email = $data->email;
        $student->save();

        return redirect()->route('home')->with('success','Data is added sucessfully');
    }
}
