@extends('admin.layouts.index')
@section('content')
    <!--begin::Portlet-->
    {{--<div class="m-portlet" style="width: auto;">--}}
        {{--<div class="m-portlet__head">--}}
            {{--<div class="m-portlet__head-caption">--}}
                {{--<div class="m-portlet__head-title">--}}
                    {{--<h3 class="m-portlet__head-text">--}}
                        {{--Add New Job--}}
                    {{--</h3>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!--begin::Form-->--}}


        {{--<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/storejob">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="m-portlet__body">--}}
                {{--<div class="form-group m-form__group row">--}}
                    {{--<label style="width: 930px" class="col-form-label col-lg-3 col-sm-12">--}}
                        {{--Title--}}
                    {{--</label>--}}
                    {{--<div class="col-lg-4 col-md-9 col-sm-12">--}}
                        {{--<input type="text" class="form-control" id="title" name="title" placeholder="Title"/>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group m-form__group row">--}}
                    {{--<label class="col-form-label col-lg-3 col-sm-12">--}}
                        {{--Minimum Salary--}}
                    {{--</label>--}}
                    {{--<div class="col-lg-4 col-md-9 col-sm-12">--}}
                        {{--<input type="number" step=0.1 class="form-control m-input" placeholder="Minimum Salary"--}}
                               {{--id="min_salary" name="min_salary"/>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="form-group m-form__group row">--}}
                    {{--<label class="col-form-label col-lg-3 col-sm-12">--}}
                        {{--Maximum Salary--}}
                    {{--</label>--}}
                    {{--<div class="col-lg-4 col-md-9 col-sm-12">--}}
                        {{--<input type="number" step=0.1 class="form-control m-input" placeholder="Maximum Salary"--}}
                               {{--id="max_salary" name="max_salary"/>--}}
                    {{--</div>--}}
                {{--</div>--}}


            {{--</div>--}}
            {{--<div class="m-portlet__foot m-portlet__foot--fit">--}}
                {{--<div class="m-form__actions m-form__actions">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-9 ml-lg-auto">--}}
                            {{--<button type="submit" class="btn btn-brand m-btn--pill">--}}
                                {{--Submit--}}
                            {{--</button>--}}
                            {{--<button type="reset" class="btn btn-secondary m-btn--pill">--}}
                                {{--Cancel--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<hr>--}}
        {{--</form>--}}
        {{--<!--end::Form-->--}}
    {{--</div>--}}
    {{--<!--end::Portlet-->--}}
    {{--<!--begin::Modal-->--}}

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Job</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
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
            <h3 class="card-title">Add New Job</h3>
        </div>
        <div class="card-body">


            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/store_job">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="number" step=0.1 min="0" class="form-control" id="min_salary" name="min_salary"
                           placeholder="Minimum Salary">
                    <div class="input-group-append">
                        <span class="input-group-text">EGP</span>
                    </div>
                </div>


                <div class="input-group mb-3">
                    <input type="number" step=0.1 min="0" class="form-control" id="max_salary" name="max_salary"
                           placeholder="Maximum Salary">
                    <div class="input-group-append">
                        <span class="input-group-text">EGP</span>
                    </div>
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