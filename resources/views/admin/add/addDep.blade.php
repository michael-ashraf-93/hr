@extends('admin.layouts.index')
@section('content')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Employee</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css"/>--}}
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>--}}
        <!-- Font Awesome -->
        <link rel="stylesheet"
              href="{{ url('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
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
        <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
    </head>
    <!-- Input addon -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add New Department</h3>
        </div>
        <div class="card-body">


            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/store_department">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group date">
                        <select class="selectpicker form-control m-input" data-live-search="true" id="location"
                                name="location">
                            <option>Location</option>
                            @foreach(@\App\Location::get() as $locations)
                                <option value="{{ $locations->id }}">{{ $locations->street_address . ', ' . $locations->city . ', ' . $locations->country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="input-group mb-3">
                    <select class="selectpicker form-control m-input" data-live-search="true" id="manager"
                            name="manager">
                        <option>Manager</option>
                        @foreach(@\App\User::get() as $user)
                            <option value="{{ $user->id }}">{{ $user->fname . ' ' . $user->lname }}</option>
                        @endforeach
                    </select>
                </div>




                <button type="submit" class="btn btn-primary m-btn--pill">
                    Submit
                </button>
                <button type="button" id="goBack" class="btn btn-secondary m-btn--pill">
                    Cancel
                </button>

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