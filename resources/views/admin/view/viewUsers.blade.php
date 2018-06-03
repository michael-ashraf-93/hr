@extends('admin.layouts.index')
{{--@include('admin.layouts.tables')--}}
@section('content')
    @if(count($users))
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title"><b>Jobs</b></h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h1> <span style="color: dodgerblue"><span
                                            style="color: gainsboro">{{ $users->count() }}</span> Of
                <span style="color: gainsboro"> {{ $users->total() }} </span> Users</span></h1>
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
                                    {{--<tbody>--}}
                                    {{--@foreach($users as $user)--}}
                                    {{--<tr>--}}
                                    {{--<td>{{ $user->fname .' '. $user->lname }}</td>--}}
                                    {{--<td>{{ $user->phone }}</td>--}}
                                    {{--<td>{{ $user->hire_date }}</td>--}}
                                    {{--<td>{{ $user->salary }}</td>--}}
                                    {{--<td>{{ $user->commission_pct }}</td>--}}
                                    {{--@if(isset($user->manager->fname))--}}
                                    {{--<td>{{ $user->manager->fname .' '. $user->manager->lname }}</td>--}}
                                    {{--@else--}}
                                    {{--<td> --</td>--}}
                                    {{--@endif--}}
                                    {{--<td>{{ $user->department->name }}</td>--}}
                                    {{--<td>{{ $user->Job->title }}</td>--}}
                                    {{--<td>{{ $user->email }}</td>--}}
                                    {{--<td>--}}
                                    {{--<a href="/{{ $user->id }}/edit_employee">--}}
                                    {{--<button class="btn btn-primary btn-xs">--}}
                                    {{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}
                                    {{--</button>--}}
                                    {{--</a>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<a href="/{{ $user->id }}/employee_destroy">--}}
                                    {{--<button class="btn btn-danger btn-xs" data-title="Delete"--}}
                                    {{--data-toggle="modal" data-target="#delete">--}}
                                    {{--<i class="fa fa-trash-o"></i>--}}
                                    {{--</button>--}}
                                    {{--</a>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--@endforeach--}}
                                    {{--</tbody>--}}
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            @if(auth()->user()->id == $user->id)
                                                <td>
                                                    <span style="color: rgb(40, 167, 69);">{{ $user->fname .' '. $user->lname }}</span>
                                                </td>
                                            @else
                                                <td>{{ $user->fname .' '. $user->lname }}</td>
                                            @endif
                                            <td>{{ $user->phone }}</td>
                                            @if(isset($user->hire_date))
                                                <td>{{ @$user->hire_date }}</td>
                                            @else
                                                <td> --</td>
                                            @endif
                                            @if(isset($user->salary))
                                                <td>{{ @$user->salary }}</td>
                                            @else
                                                <td> --</td>
                                            @endif
                                            @if(isset($user->commission_pct))
                                                <td>{{ @$user->commission_pct }}</td>
                                            @else
                                                <td> --</td>
                                            @endif
                                            @if(isset($user->manager->fname))
                                                <td>{{ $user->manager->fname .' '. $user->manager->lname }}</td>
                                            @else
                                                <td> --</td>
                                            @endif
                                            @if(isset($user->department->name))
                                                <td>{{ @$user->department->name }}</td>
                                            @else
                                                <td> --</td>
                                            @endif
                                            @if(isset($user->job->title))
                                                <td>{{ $user->Job->title }}</td>
                                            @else
                                                <td> --</td>
                                            @endif
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="/{{ $user->id }}/edit_employee">
                                                    <button class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger  Destroy" usrid="{{ $user->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $users->links() }}

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
            <img style="width: 80%;" src="{{ asset('no.svg') }}" alt="No Users!">
            <h1 style="color: #666666">Whoops, No Countries Found!</h1>
            <h2 style="color: #a9a9a9">You Can Add New Country<h1>
                    <a href="user/create" style="color: #007bff"><b>Here</b>
                    </a></h1></h2>
        </div>

    @endif
@endsection

@section('js')
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('usrid');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ url('user/destroy') }}',
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