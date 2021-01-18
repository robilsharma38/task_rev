<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;

class HomeController extends Controller
{
    public function index()
    {
        $teacher = Teacher::count();
        $student = Student::count();
        return view('index',compact('teacher','student'));
    }
}
