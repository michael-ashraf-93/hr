@extends('admin.layouts.index')
{{--@include('admin.layouts.tables')--}}
@section('content')



@if(count($departments))
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title"><b>Jobs</b></h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('lang.name') }}</th>
                                <th>{{ __('lang.location') }}</th>
                                <th>{{ __('lang.manager') }}</th>
                                <th>{{ __('lang.edit') }}</th>
                                <th>{{ __('lang.delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->location->street_address . ', ' . $department->location->city . ', ' . $department->location->country->name }}</td>

                                    @if(isset($department->manager->fname))
                                        <td>{{ $department->manager->fname .' '. $department->manager->lname }}</td>
                                    @else
                                        <td> --</td>
                                    @endif

                                    <td>
                                        <a href="/{{ $department->id }}/edit_department">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>

                                    <td>
                                        <button class="btn btn-danger  Destroy" depid="{{ $department->id }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@else
    <div style="text-align:center;">
        <img style="width: 80%;" src="{{ asset('no.svg') }}" alt="No Departments!">
        <h1 style="color: #666666">Whoops, No Department Found!</h1>
        <h2 style="color: #a9a9a9">You Can Add New Department<h1>
                <a href="department/create" style="color: #007bff"><b>Here</b>
                </a></h1></h2>
    </div>

@endif

@endsection


@section('js')
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('depid');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ url('department/destroy') }}',
                    type: 'post',
                    dataType: 'json',
                    data: {id: id, _token: _token},
                    success: function (data) {
                        if (data.status == true) {
                            alert('Deleted');
                            $('#user' + id).remove();
                        }
                        else {
                            alert('Error');
                        }
                    }
                });
            }
        )
    </script>
@endsection