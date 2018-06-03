@extends('admin.layouts.index')
@include('admin.modals.AddLocationModal')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add New Location
                <span style="float: right;">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#AddRegionModal">
                Add Region
            </button>
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#AddCountryModal">
                Add Country
            </button>
            </span></h3>
        </div>
        <div class="card-body">


            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/store_location">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="street_address" name="street_address"
                           placeholder="Street Address">
                    <div class="input-group-append">
                        {{--<span class="input-group-text">--}}
                        {{--<i class="fa fa-user-o"></i>--}}
                        {{--</span>--}}
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="number" class="form-control" id="postal_code" name="postal_code"
                           placeholder="Postal Code">
                    <div class="input-group-append">
                        {{--<span class="input-group-text">--}}
                        {{--<i class="fa fa-user-o"></i>--}}
                        {{--</span>--}}
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                    <div class="input-group-append">
                        {{--<span class="input-group-text">--}}
                        {{--<i class="fa fa-user-o"></i>--}}
                        {{--</span>--}}
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group date">
                        <select class="selectpicker form-control m-input" data-live-search="true" id="region"
                                name="region">
                            <option>--</option>
                            @foreach(@\App\Region::all() as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <i class="fa fa-spinner fa-spin" id="Spinner" style="display: none"></i>

                <div class="input-group mb-3">
                    <div class="input-group date">
                        <select class="selectpicker form-control m-input" data-live-search="true" id="country"
                                name="country">

                        </select>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary m-btn--pill">
                    Submit
                </button>
                <button type="button" id="goBack" class="btn btn-secondary m-btn--pill">
                    Cancel
                </button>

            </form>

        </div>
    </div>

@endsection

@section('js')

    <script>
        $(document).on('click', '#goBack', function () {
            window.history.back();
        })

        $(document).on('change', '#region', function () {
            var id = $(this).val();
            var _token = '{{csrf_token()}}';
            $.ajax({
                url: '{{url('/get-countries')}}',
                method: 'post',
                dataType: 'html',
                data: {region_id: id, _token: _token},
                success: function (response) {
                    $('#country').html(response);
                    $('#Spinner').hide();
                },
                error: function() {
                    alert('error');
                    $('#Spinner').hide();
                },
                beforeSend: function () {
                    $('#Spinner').show();
                }
            })
        })


    </script>
@endsection