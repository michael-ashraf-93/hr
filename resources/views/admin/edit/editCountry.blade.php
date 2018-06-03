@extends('admin.layouts.index')
@section('content')

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Department</h3>
        </div>
        <div class="card-body">

            @foreach($department as $department)
                <form class="m-form m-form--fit m-form--label-align-right" method="POST"
                      action="/{{ $department->id }}/update_department">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}">
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
                                <option value="{{ $department->location_id }}">{{$department->location->street_address . ', ' . $department->location->city . ', ' . $department->location->country->name }}</option>
                                @foreach(@\App\Location::get() as $locations)
                                    <option value="{{ $locations->id }}">{{ $locations->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group date">
                            <select class="selectpicker form-control m-input" data-live-search="true" id="manager"
                                    name="manager">
                                @if($department->manager_id)
                                    <option value="{{ $department->manager_id }}">{{ $department->manager->fname .' '. $department->manager->lname }}</option>
                                @else
                                    <option>--</option>
                                @endif
                                @foreach(@\App\Job::get() as $job)
                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                @endforeach
                            </select>
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