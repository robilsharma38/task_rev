<div class="row" style="margin-top:22px;">
   <div class="col-lg-12">
      <label for="weave">Teacher</label> <small style="color:red;">*</small>
      <select name="teacher_id" id="teacher_id" class="form-control">
         <option value="" disabled selected="true">Select</option>
         @foreach($teachers as $teacher)
            <option value="{{$teacher->id}}" {{$student->teacher_id == $teacher->id ? 'selected' : ''}}>{{$teacher->name}}</option>
         @endforeach
      </select>
   </div>
   <div class="col-lg-12" style="margin-top:20px;">
      <label for="weave">Name</label> <small style="color:red;">*</small>
      <input type="text" name="name" value="{{old('name',$student->name)}}" class="form-control">
   </div>
   <div class="col-lg-12" style="margin-top:20px;">
      <label for="weave">Email</label> <small style="color:red;">*</small>
      <input type="email" name="email" value="{{old('email',$student->email)}}" class="form-control">
   </div>
   <div class="col-lg-12" style="margin-top:20px;">
      <label for="weave">Class</label> <small style="color:red;">*</small>
      <input type="number" name="class" min="1" max="12" value="{{old('class',$student->class)}}" class="form-control">
   </div>
   <div class="col-lg-12" style="margin-top:20px;">
      <input type="hidden" name="old_image" value="{{$student->profile_pic}}">
      <label for="weave">Profile</label> <small style="color:red;">*</small>
      <input type="file" name="profile_pic" id="profile_pic" class="form-control">
   </div>
</div>
<button class="btn btn-primary" type="submit" style="margin-top:20px;">Submit form</button>