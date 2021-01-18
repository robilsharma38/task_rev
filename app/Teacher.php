<?php

namespace App;

use DB;
use File;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

    public function store_teacher($data)
    {
        $image = $data['profile_pic'];
        unset($data['old_image']);
        $response = array();
        try{
            $teacher = Teacher::create($data);
            $id = $teacher->id;
            // Uploading image and making folder
            $this->uploadPic($image,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            $response['status'] = 2;
        }
        return $response;
    }

    public function update_teacher($data,$id)
    {
        $image = $data['old_image'];
        $imageValue = Teacher::select('profile_pic')->find($id);
        if(!empty($data['profile_pic']))
        {
            $path = public_path()."/images/teacher/".$imageValue->profile_pic;
            File::delete($path);
            $image = $data['profile_pic'];
        }
        try{
            unset($data['old_image']);
            $teacher = DB::table('teachers')->where('id',$id)->update($data);
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
            $destinationPath = public_path('images/teacher/');
            $image->move($destinationPath, $t_image);
            DB::table('teachers')->where('id',$id)->update(['profile_pic'=>$t_image]);
        }
        else
        {
            DB::table('teachers')->where('id',$id)->update(['profile_pic'=>$image]);
        }
        
    }
}
