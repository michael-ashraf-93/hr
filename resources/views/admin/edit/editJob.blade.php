@extends('admin.layouts.index')
@section('content')

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Employee</h3>
        </div>
        <div class="card-body">

            @foreach($job as $job)
                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/{{ $job->id }}/update_job">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="title" name="title" value="{{ $job->title }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="number" step=0.1 min="0" class="form-control" id="min_salary" name="min_salary"
                               value="{{ $job->min_salary }}">
                        <div class="input-group-append">
                            <span class="input-group-text">EGP</span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="number" step=0.1 min="0" class="form-control" id="max_salary" name="max_salary"
                               value="{{ $job->max_salary }}">
                        <div class="input-group-append">
                            <span class="input-group-text">EGP</span>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary m-btn--pill">
                        Update
                    </button>
                    <button type="button" id="goBack" class="btn btn-secondary m-btn--pill">
                        Cancel
                    </button>

                </form>
            @endforeach
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