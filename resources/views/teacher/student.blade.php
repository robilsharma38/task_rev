@extends('layouts.admin')
@section('title','Students')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <h4 class="page-title">Student Master</h4>
         </div>
      </div>
   </div>
   <!-- end page title --> 
   <div class="row">
      <div class="col-12">
         @if(Session::has('danger'))
         <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{Session::get('danger')}}</strong> 
         </div>
         @endif
         @if(Session::has('success'))
         <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{Session::get('success')}}</strong> 
         </div>
         @endif
         <div class="card">
            <div class="card-body">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <a href="{{route('student.create')}}" class="btn btn-danger mb-2" style="float:right;"><i class="mdi mdi-plus-circle mr-2"></i> Add Student</a>
                  </div>
               </div>
               <div class="tab-content">
                  <div class="tab-pane show active" id="buttons-table-preview">
                     <table id="example" class="table table-striped dt-responsive nowrap w-100">
                           <thead>
                              <tr>
                                 <th>id</th>
                                 <th>Profile</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Class</th>
                                 <th>Teacher</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @php $i = 1; @endphp
                           @foreach($students as $student)
                              <tr>
                                 <td>{{$i++}}</td>
                                 <td>
                                 @if(!$student->profile_pic)
                                 <img src="{{url('public/1.jpg')}}" style="height:100px;" alt="{{$student->name}}">
                                 @else
                                 <img src="{{url('public/images/student')}}/{{$student->profile_pic}}" style="height:100px;" alt="{{$student->name}}">
                                 @endif
                                 </td>
                                 <td>{{$student->name}}</td>
                                 <td>{{$student->email}}</td>
                                 <td>{{$student->class}}</td>
                                 <td>{{$student->t_name}}</td>
                                 <td><a href="{{url('/student')}}/{{$student->id}}/edit"><i class="mdi mdi-pencil"></i></a> <form action="{{url('/student')}}/{{$student->id}}" method="POST" class="action-icon">@method('DELETE')@csrf<button class="action-icon" style="border:none;background: none;color:#727cf5"> <i class="mdi mdi-delete"></i></form></td>
                              </tr>
                           @endforeach
                           </tbody>
                     </table>                                           
                  </div> <!-- end preview-->
               </div> <!-- end tab-content-->
            </div>
            <!-- end card-body-->
         </div>
         <!-- end card -->
      </div>
      <!-- end col-->
   </div>
   <!-- end row-->
</div>
<!-- container -->
</div> <!-- content -->
@endsection