@extends('admin.layouts.index')
{{--@include('admin.layouts.tables')--}}
@section('content')
@if(count($managers))
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title"><b>Jobs</b></h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Hire Date</th>
                                <th>Salary</th>
                                <th>Commission</th>
                                <th>Manager</th>
                                <th>Department</th>
                                <th>Job</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            @foreach($managers as $manager)
                                <tr>
                                    <td>{{ $manager->fname .' '. $manager->lname }}</td>
                                    <td>{{ $manager->phone }}</td>
                                    <td>{{ $manager->hire_date }}</td>
                                    <td>{{ $manager->salary }}</td>
                                    <td>{{ $manager->commission_pct }}</td>
                                    @if(isset($manager->manager->fname))
                                        <td>{{ $manager->manager->fname .' '. $manager->manager->lname }}</td>
                                    @else
                                        <td> --</td>
                                    @endif
                                    <td>{{ $manager->department->name }}</td>
                                    <td>{{ $manager->Job->title }}</td>
                                    <td>{{ $manager->email }}</td>
                                    <td>
                                        <a href="/{{ $manager->id }}/edit_employee">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger  Destroy" mngrid="{{ $manager->id }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
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
        <img style="width: 80%;" src="{{ asset('no.svg') }}" alt="No Managers!">
        <h1 style="color: #666666">Whoops, No Managers Found!</h1>
        <h2 style="color: #a9a9a9">You Can Add New Manager<h1>
                <a href="user/create" style="color: #007bff"><b>Here</b>
                </a></h1></h2>
    </div>

@endif

@endsection

@section('js')
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('mngrid');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ url('manager/destroy') }}',
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