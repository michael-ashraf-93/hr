@extends('admin.layouts.index')
{{--@include('admin.layouts.tables')--}}
@section('content')
    @if(count($jobs))
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
                                <th>Title</th>
                                <th>Minimum Salary</th>
                                <th>Maximum Salary</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->min_salary }}</td>
                                    <td>{{ $job->max_salary }}+</td>
                                    <td>
                                        <a href="/{{ $job->id }}/edit_job">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger  Destroy" joid="{{ $job->id }}">
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
            <img style="width: 80%;" src="{{ asset('no.svg') }}" alt="No Books Published Yet!">
            <h1 style="color: #666666">Whoops, No Jobs Found!</h1>
            <h2 style="color: #a9a9a9">You Can Add New Job<h1>
                    <a href="job_create" style="color: #007bff"><b>Here</b>
                    </a></h1></h2>
        </div>

    @endif

@endsection


@section('js')
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('joid');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ url('job/destroy') }}',
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