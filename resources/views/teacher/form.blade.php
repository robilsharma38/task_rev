<div class="form-group mb-3">
   <label for="title">Name</label> <small style="color:red;">*</small>
   <input type="text" class="form-control" id="title"
      placeholder="Enter Teacher Name" name="name" value="{{old('name',$teacher->name)}}" required>
</div>
<div class="form-group mb-3">
   <label for="title">Email</label> <small style="color:red;">*</small>
   <input type="email" class="form-control" id="email"
      placeholder="Enter Teacher Email" name="email" value="{{old('email',$teacher->email)}}" required>
</div>
<div class="panel panel-default" style="margin-top:30px;margin-bottom:30px;">
<input type="hidden" name="old_image" value="{{$teacher->profile_pic}}">
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-12">
            <label for="image_1">Image</label> <small style="color:red;">*</small>
            <input name="profile_pic" type="file" value="{{old('profile_pic')}}" class="form-control">
         </div>
      </div>
   </div>
</div>
<button class="btn btn-primary" type="submit">Submit form</button>
<br>
<p id="warning" style="color:red;margin-top:5px;"></p>