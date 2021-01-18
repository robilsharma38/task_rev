@extends('layouts.admin')
@section('title','Edit Student')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row" style="margin-top:80px;">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Edit Student</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                <form id="edit_student" action="{{url('student')}}/{{$student->id}}" method="post" enctype="multipart/form-data">
                                                @method('PATCH')
                                                    @include('student.form')
                                                @csrf
                                                </form>                                            
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
@endsection
@section('javascript')
$.validator.setDefaults({
        submitHandler : function(form) {
            form.submit();
        }
    });
    $("#edit_student").validate({

        rules: {
                teacher_id: "required",
                email: "required",
                name: "required",
                class: "required",
            },

            messages: {
                teacher_id: "* Select Teacher",
                email: "* Enter email",
                name: "* Enter name",
                class: "* Enter class",
            }
        });
@endsection