<?php

namespace App;

use DB;
use File;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function store_student($data)
    {
        $image = $data['profile_pic'];
        unset($data['old_image']);
        $response = array();
        try{
            $student = Student::create($data);
            $id = $student->id;
            // Uploading image and making folder
            $this->uploadPic($image,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            $response['status'] = 2;
        }
        return $response;
    }

    public function update_student($data,$id)
    {
        $image = $data['old_image'];
        $imageValue = Student::select('profile_pic')->find($id);
        if(!empty($data['profile_pic']))
        {
            $path = public_path()."/images/student/".$imageValue->profile_pic;
            File::delete($path);
            $image = $data['profile_pic'];
        }
        try{
            unset($data['old_image']);
            $teacher = DB::table('students')->where('id',$id)->update($data);
            $this->uploadPic($image,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            $response['status'] = 2;
        }
        return $response;
    }

    public function uploadPic($image,$id)
    {
        // Uploading image and making folder
        if(!is_string($image) && !is_null($image))
        {
            $t_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/student/');
            $image->move($destinationPath, $t_image);
            DB::table('students')->where('id',$id)->update(['profile_pic'=>$t_image]);
        }
        else
        {
            DB::table('students')->where('id',$id)->update(['profile_pic'=>$image]);
        }
        
    }
}
