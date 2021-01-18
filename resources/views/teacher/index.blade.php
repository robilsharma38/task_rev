@extends('layouts.admin')
@section('title','Teacher Index')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <h4 class="page-title">Teacher Master</h4>
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
                     <a href="{{route('teacher.create')}}" class="btn btn-danger mb-2" style="float:right;"><i class="mdi mdi-plus-circle mr-2"></i> Add Teacher</a>
                  </div>
               </div>
               <div class="tab-content">
                  <div class="tab-pane show active" id="buttons-table-preview">
                     <table id="example" class="table table-striped dt-responsive nowrap w-100">
                           <thead>
                              <tr>
                                 <th>id</th>
                                 <th>Profile Pic</th>
                                 <th>Name</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @php $i = 1; @endphp
                           @foreach($teachers as $teacher)
                              <tr>
                                 <td>{{$i++}}</td>
                                 <td>
                                 @if(!$teacher->profile_pic)
                                 <img src="{{url('public/1.jpg')}}" style="height:100px;" alt="{{$teacher->name}}">
                                 @else
                                 <img src="{{url('public/images/teacher')}}/{{$teacher->profile_pic}}" style="height:100px;" alt="{{$teacher->name}}">
                                 @endif
                                 </td>
                                 <td>{{$teacher->name}}</td>
                                 <td><a href="{{url('/teacher')}}/{{$teacher->id}}/edit"><i class="mdi mdi-pencil"></i></a> <a href="{{url('/teacher')}}/{{$teacher->id}}"><i class="mdi mdi-eye"></i></a> <form action="{{url('/teacher')}}/{{$teacher->id}}" method="POST" class="action-icon">@method('DELETE')@csrf<button class="action-icon" style="border:none;background: none;color:#727cf5"> <i class="mdi mdi-delete"></i></form></td>
                              </tr>
                           @endforeach
                           </tbody>
                     </table> 
                     <div style="float:right;">
                        {{$teachers->render()}}
                     </div>                                          
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