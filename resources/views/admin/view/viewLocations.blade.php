@extends('admin.layouts.index')
{{--@include('admin.layouts.tables')--}}
@section('content')



    @if(count($locations))
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
                                    <th>Street Address</th>
                                    <th>Postal Code</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Region</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                @foreach($locations as $location)
                                    <tr>
                                        <td>{{ $location->street_address }}</td>
                                        <td>{{ $location->postal_code }}</td>
                                        <td>{{ $location->city }}</td>
                                        <td>{{ $location->country->name }}</td>
                                        <td>{{ $location->country->region->name }}</td>
                                        <td>
                                            <a href="/{{ $location->id }}/editlocation">
                                                <button class="btn btn-primary btn-xs">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </td>

                                        <td>
                                            <button class="btn btn-danger  Destroy" locid="{{ $location->id }}">
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
            <img style="width: 80%;" src="{{ asset('no.svg') }}" alt="No Locations!">
            <h1 style="color: #666666">Whoops, No Locations Found!</h1>
            <h2 style="color: #a9a9a9">You Can Add New Location<h1>
                    <a href="department/create" style="color: #007bff"><b>Here</b>
                    </a></h1></h2>
        </div>

    @endif
@endsection
@section('js')
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('locid');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ url('location/destroy') }}',
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