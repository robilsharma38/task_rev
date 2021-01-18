<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Session;
use Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $teacher;
    
    public function __construct()
    {
        $this->student = new Student();
    }

    public function index()
    {
        $students = Student::select('students.id','students.name','students.email','students.profile_pic','students.class','t.name as t_name','students.email')->join('teachers as t','t.id','=','students.teacher_id')->paginate(10);
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new Student();
        $teachers = Teacher::all();
        return view('student.create',compact('student','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make(request()->all(),[
            'teacher_id'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'class'=>'required',
            'profile_pic'=>'required',
        ]);
        if($data->fails())
        {
            return redirect()->back()->withErrors($data)->withInput();
        }
        else
        {
            $data = request()->all();
        }
        $response = $this->student->store_student($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Student Added Successfully !!');
            return redirect()->route('student.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('student.edit',compact('student','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = Validator::make(request()->all(),[
            'teacher_id'=>'required',
            'name'=>'required',
            'profile_pic'=>'sometimes|required',
            'email'=>'required|email',
            'class'=>'required',
        ]);
        if($data->fails())
        {
            return redirect()->back()->withErrors($data)->withInput();
        }
        else
        {
            $data = request()->except(['_method','_token']);
        }
        $response = $this->student->update_student($data,$student->id);
        if($response['status'] == '1')
        {
            Session::flash('success','Student Updated Successfully !!');
            return redirect()->route('student.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try{
            $student->delete();
            Session::flash('success','Student Deleted Successfully !!');
            return redirect()->route('student.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
}
