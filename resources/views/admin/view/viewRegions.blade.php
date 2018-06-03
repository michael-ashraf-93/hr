@extends('admin.layouts.index')
{{--@include('admin.layouts.tables')--}}
@include('admin.modals.AddLocationModal')
@section('content')
@if(count($regions))
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            @foreach($regions as $region)
                                <tr>
                                    <td>{{ $region->name }}</td>
                                    <td>
                                        <a href="/{{ $region->id }}/edit_region">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger  Destroy" regnid="{{ $region->id }}">
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
        <img style="width: 80%;" src="{{ asset('no.svg') }}" alt="No Regions!">
        <h1 style="color: #666666">Whoops, No Regions Found!</h1>
        <h2 style="color: #a9a9a9">You Can Add New Region<h1>
                <a href="#" style="color: #007bff" data-toggle="modal" data-target="#AddRegionModal"><b>Here</b>
                </a></h1></h2>
    </div>

@endif
@endsection


@section('js')
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('regnid');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ url('region/destroy') }}',
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