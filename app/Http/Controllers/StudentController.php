<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        return view('welcome');
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
