<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Session;
use Validator;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teacher;
    
    public function __construct()
    {
        $this->teacher = new Teacher();
    }

    public function index()
    {
        $teachers = Teacher::paginate(10);
        return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = new Teacher();
        return view('teacher.create',compact('teacher'));
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
            'name'=>'required',
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
        $response = $this->teacher->store_teacher($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Teacher Added Successfully !!');
            return redirect()->route('teacher.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function show(Teacher $teacher)
    {
        $students = Student::select('students.id','students.name','students.email','students.profile_pic','students.class','t.name as t_name','students.email')->join('teachers as t','t.id','=','students.teacher_id')->where('teacher_id',$teacher->id)->get();
        return view('teacher.student',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data = Validator::make(request()->all(),[
            'name'=>'required',
            'profile_pic'=>'sometimes|required',
        ]);
        if($data->fails())
        {
            return redirect()->back()->withErrors($data)->withInput();
        }
        else
        {
            $data = request()->except(['_method','_token']);
        }
        $response = $this->teacher->update_teacher($data,$teacher->id);
        if($response['status'] == '1')
        {
            Session::flash('success','Teacher Updated Successfully !!');
            return redirect()->route('teacher.index');
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
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        try{
            $teacher->delete();
            Session::flash('success','Teacher Deleted Successfully !!');
            return redirect()->route('teacher.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }
}
