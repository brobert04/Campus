@extends('admin.template')
@section('title', Auth::user()->name . ' | ' . 'Edit User')
@section('custom-css')
    <link rel="stylesheet" href="{{asset('../backend/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <link rel="stylesheet" href="{{asset('../backend/plugins/daterangepicker/daterangepicker.css')}}">
@endsection
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Edit {{$user->name}}'s Information</h3>
        </div>
        <div class="card-body p-3">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle"><i class="fas fa-pen"></i></span>
                            <span class="bs-stepper-label">Personal Data</span>
                        </button>
                    </div>
                    <div class="line"></div>
                </div>
                <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <form method="post" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="custom-select form-control @error('role') is-invalid @enderror" id="role" name="role">
                                            <option class="text-center">-- Select user role --</option>
                                            <option value="Admin" {{($user->role == "Admin" ? 'selected' : "") }}>Admin</option>
                                            <option value="Teacher" {{($user->role == "Teacher" ? 'selected' : "") }}>Teacher</option>
                                            <option value="Employee" {{($user->role == "Employee" ? 'selected' : "")}}>Employee</option>
                                            <option value="Parent" {{($user->role == "Parent" ? 'selected' : "")}}>Parent</option>
                                        </select>
                                        @error('role')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter full name" value="{{$user->name}}">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email"  value="{{$user->email}}">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" data-target="#reservationdate"
                                            id="date" name="date" value="{{$user->birthday}}" disabled>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            @error('date')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="custom-select form-control @error('gender') is-invalid @enderror" id="gender" name="gender" disabled>
                                            <option class="text-center">-- Select user gender --</option>
                                            <option value="Male" {{ ($user->gender == "Male" ? "selected" : "") }}>Male</option>
                                            <option value="Female" {{ ($user->gender == "Female" ? "selected" : "") }}>Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone number" name="phone"  value="{{$user->phone}}">
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter address" name="address"  value="{{$user->address}}">
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('custom-js')
    <script src="{{asset('../backend/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    </script>
@endsection
