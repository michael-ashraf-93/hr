@extends('admin.layouts.index')
@section('content')

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Employee</h3>
        </div>
        <div class="card-body">

            @foreach($users as $user)
                <form class="m-form m-form--fit m-form--label-align-right" method="POST"
                      action="/{{ $user->id }}/update_employee">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="fname" name="fname" value="{{ $user->fname }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="lname" name="lname" value="{{ $user->lname }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-phone"></i>
                        </span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="date" class="form-control" id="hire_date" name="hire_date"
                               value="{{ $user->hire_date }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                        </span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" step=0.1 min="0" class="form-control" id="salary" name="salary"
                               value="{{ $user->salary }}">
                        <div class="input-group-append">
                            <span class="input-group-text">EGP</span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="number" step=0.01 min="0" class="form-control" id="commission" name="commission"
                               value="{{ $user->commission_pct }}">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <select class="selectpicker form-control m-input" data-live-search="true" id="manager"
                                name="manager">
                            @if($user->manager_id)
                                <option value="{{ $user->manager_id }}">{{ $user->manager->fname . ' ' . $user->manager->lname }}</option>
                            @else
                                <option>--</option>
                            @endif
                            @foreach(@\App\User::get() as $users)
                                <option value="{{ $users->id }}">{{ $users->fname . ' ' . $users->lname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group date">
                            <select class="selectpicker form-control m-input" data-live-search="true" id="department"
                                    name="department">
                                <option value="{{ $user->department_id }}">{{ $user->department->name }}</option>
                                @foreach(@\App\Department::get() as $departments)
                                    <option value="{{ $departments->id }}">{{ $departments->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group date">
                            <select class="selectpicker form-control m-input" data-live-search="true" id="job"
                                    name="job">
                                <option value="{{ $user->job_id }}">{{ $user->job->title }}</option>
                                @foreach(@\App\Job::get() as $job)
                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-envelope-o"></i>
                        </span>
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