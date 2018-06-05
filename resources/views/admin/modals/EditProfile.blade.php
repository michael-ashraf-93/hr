<link rel="stylesheet" href="{{ url('admin/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
<div class="modal fade" id="EditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{--@if(isset($user))--}}
                <form class="m-form m-form--fit m-form--label-align-right" method="POST"
                      action="/{{ auth()->user()->id }}/update_profile">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="fname" name="fname"
                               value="{{ auth()->user()->fname }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="lname" name="lname"
                               value="{{ auth()->user()->lname }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-o"></i>
                        </span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="phone" name="phone"
                               value="{{ auth()->user()->phone }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-phone"></i>
                        </span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="date" class="form-control" id="hire_date" name="hire_date"
                               value="{{ auth()->user()->hire_date }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                        </span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" step=0.1 min="0" class="form-control" id="salary" name="salary"
                               value="{{ auth()->user()->salary }}">
                        <div class="input-group-append">
                            <span class="input-group-text">EGP</span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="number" step=0.01 min="0" class="form-control" id="commission"
                               name="commission"
                               value="{{ auth()->user()->commission_pct }}">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <select class="selectpicker form-control m-input" data-live-search="true" id="manager"
                                name="manager">
                            @if(@auth()->user()->manager_id)
                                <option value="{{ auth()->user()->manager_id }}">{{ auth()->user()->manager->fname . ' ' . auth()->user()->manager->lname }}</option>
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
                            <select class="selectpicker form-control m-input" data-live-search="true"
                                    id="department"
                                    name="department">
                                @if(@auth()->user()->department_id)
                                    <option value="{{ auth()->user()->department_id }}">{{ auth()->user()->department->name }}</option>
                                @else
                                    <option>--</option>
                                @endif
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
                                @if(@auth()->user()->job_id)
                                    <option value="{{ auth()->user()->job_id }}">{{ auth()->user()->job->name }}</option>
                                @else
                                    <option>--</option>
                                @endif
                                @foreach(@\App\Job::get() as $job)
                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ auth()->user()->email }}">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Enter your Password"/>
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation"
                               id="password_confirmation" placeholder="Confirm your Password"/>
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
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

            </div>
        </div>
    </div>
</div>


{{--@section('js')--}}
{{--<script>--}}
{{--n = new Date();--}}
{{--y = n.getFullYear();--}}
{{--m = n.getMonth();--}}
{{--d = n.getDate();--}}
{{--//    alert(y + "-" + m + "-" + d)--}}
{{--$('#Date').val(m + "-" + d + "-" + y)--}}
{{--//    document.getElementById("Date").val = y + "-" + m + "-" + d;--}}
{{--</script>--}}

{{--<script type="text/javascript">--}}
{{--$(function () {--}}
{{--$('#datetimepicker1').datetimepicker();--}}
{{--});--}}
{{--</script>--}}
{{--@endsection--}}

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>