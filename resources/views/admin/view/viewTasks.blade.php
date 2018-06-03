@extends('admin.layouts.index')
@include('admin.modals.EditTask')
{{--@include('admin.layouts.tables')--}}
@section('content')
    @if(count($tasks))
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
                                            style="color: gainsboro">{{ $tasks->count() }}</span> Of
                <span style="color: gainsboro"> {{ $tasks->total() }} </span> Tasks</span></h1>
                            <div style="overflow-x:auto;">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Date and Time</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr id="user{{ $task->id }}">
                                            <td style="background:{{ $task->back }}; color: {{ $task->text }}">{{ $task->title }}</td>
                                            <td>{{ $task->body }}</td>
                                            <td>{{ date('d - m - Y',$task->date) }}</td>
                                            <td>
                                                <a href="task/{{ $task->id }}/edit" data-toggle="modal" data-target="#exampleModal/{{$task->id}}">
                                                    <button class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger  Destroy" tskid="{{ $task->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $tasks->links() }}

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
            <img style="width: 80%;" src="{{ asset('no.svg') }}" alt="No Tasks!">
            <h1 style="color: #666666">Whoops, No Countries Found!</h1>
            <h2 style="color: #a9a9a9">You Can Add New Country<h1>
                    <a href="#" style="color: #007bff" data-toggle="modal" data-target="#add-new-task"><b>Here</b>
                    </a></h1></h2>
        </div>

    @endif

@endsection

@section('js')
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('tskid');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ url('task/destroy') }}',
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
