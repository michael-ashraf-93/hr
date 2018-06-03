@extends('admin.layouts.index')
@include('admin.modals.AddLocationModal')
@section('content')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add User</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css"/>
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>--}}
        {{--<!-- Font Awesome -->--}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{ url('admin/plugins/daterangepicker/daterangepicker-bs3.css') }}">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{ url('admin/plugins/iCheck/all.css') }}">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{ url('admin/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="{{ url('admin/plugins/timepicker/bootstrap-timepicker.min.css') }}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ url('admin/plugins/select2/select2.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('admin/dist/css/adminlte.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <!-- Input addon -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add New User</h3>
        </div>
        <div class="card-body">


            <form class="m-form m-form--fit m-form--label-align-right orm-horizontal" method="POST"
                  action="/store_employee">
                {{ csrf_field() }}
                <div class="card-body">

                    {{--<div class="form-control">--}}
                    {{--<label for="salary" class="col-sm-2 control-label">Name</label>--}}
                    {{--<hr>--}}
                    <div class="form-group">
                        <label for="fname" class="col-sm-2 control-label">First Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="fname" name="fname">
                            <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="lname" class="col-sm-2 control-label">First Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="lname" name="lname">
                            <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                            </div>
                        </div>
                    </div>
                    {{--</div>--}}

                    {{--<br>--}}

                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Phone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="phone" name="phone" maxlength="11">
                            <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-phone"></i>
                        </span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="lname" class="col-sm-2 control-label">Hire Date</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="hire_date" name="hire_date">
                            <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </div>
                        </div>
                    </div>

                    {{--<div class="form-control">--}}
                    {{--<label for="salary" class="col-sm-2 control-label">Salary</label>--}}
                    {{--<hr>--}}
                    <div class="form-group">
                        <label for="salary" class="col-sm-2 control-label">Salary</label>
                        <div class="input-group">
                            <input type="number" step=0.1 min="0" class="form-control" id="salary" name="salary">
                            <div class="input-group-append">
                                <span class="input-group-text">EGP</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="lname" class="col-sm-2 control-label">Commission</label>
                        <div class="input-group">
                            <input type="number" step=0.01 min="0" class="form-control" id="commission"
                                   name="commission">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                    {{--</div>--}}

                    {{--<hr>--}}


                    <div class="form-group">
                        <label for="salary" class="col-sm-2 control-label">Job</label>
                        <select style="color: gray;" class="form-control select2" id="job" name="job">
                            <option value="" disabled selected hidden>--</option>
                            @foreach(@\App\Job::get() as $job)
                                <option value="{{ $job->id }}">{{ $job->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="salary" class="col-sm-2 control-label">Department</label>
                        <select style="color: gray;" class="form-control m-input select2" id="department"
                                name="department">
                            <option value="" disabled selected hidden>--</option>
                            @foreach(@\App\Department::get() as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary" class="col-sm-2 control-label">Manager</label>
                        <select style="color: gray;" class=" form-control m-input select2" id="manager"
                                name="manager">
                            <option value="" disabled selected hidden>--</option>
                            @foreach(@$managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->fname . ' ' . $manager->lname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Gender</label>
                        <select style="color: gray;" class=" form-control select2" id="gender"
                                name="gender">
                            <option value="" disabled selected hidden>--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="col-sm-2 control-label">Role</label>
                        <select style="color: gray;" class=" form-control select2" id="role"
                                name="role">
                            <option value="" disabled selected hidden>--</option>
                            <option value="hr">HR</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-2 control-label">Password Confirmation</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                            <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary m-btn--pill">
                        Submit
                    </button>
                    <button id="goBack" type="button" class="btn btn-secondary m-btn--pill">
                        Cancel
                    </button>
                </div>
            </form>

        </div>
    </div>



@endsection
@section('js')
    <script>
        $(document).on('click', '#goBack', function () {
            window.history.back();
        })
    </script>
@endsection