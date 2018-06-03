@extends('admin.layouts.index')
@section('content')
    <!--begin::Portlet-->
    <div class="m-portlet" style="width: auto;">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Add New Country
                    </h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->


        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/storecountry">
            {{ csrf_field() }}
            <div class="m-portlet__body">


                <div class="form-group m-form__group row">
                    <label style="width: 930px" class="col-form-label col-lg-3 col-sm-12">
                    </label>


                        <div style="margin-right: 8px;" class="m-radio-list">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input type="radio" name="regionTest" class="regionTest" value="1">
                                Add New Region
                                <span></span>
                            </label>
                        </div>
                    <div class="col-lg-4 col-md-9 col-sm-12" >
                        <input type="text" class="form-control" id="nregion" name="nregion" placeholder="Region"/>
                    </div><br>
                </div>


                <div class="form-group m-form__group row">
                    <label style="width: 930px" class="col-form-label col-lg-3 col-sm-12">
                    </label>


                    <div class="m-radio-list">
                        <label class="m-radio m-radio--solid m-radio--brand">
                            <input type="radio" name="regionTest" class="regionTest" value="0">
                            Select Region
                            <span></span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div style="margin-left: 27px;" class="input-group date">
                            <select class="selectpicker form-control m-input" data-live-search="true" id="oregion"
                                    name="oregion">
                                <option></option>
                                @foreach(@\App\Region::get() as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>




















                <div class="form-group m-form__group row">
                    <label style="width: 930px" class="col-form-label col-lg-3 col-sm-12">
                    </label>


                    <div class="m-radio-list">
                        <label class="m-radio m-radio--solid m-radio--brand">
                            <input type="radio" name="countryTest" class="countryTest" value="1">
                            Add New Country
                            <span></span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="ncountry" name="ncountry" placeholder="Country"/>
                    </div><br>
                </div>


                <div class="form-group m-form__group row">
                    <label style="width: 930px" class="col-form-label col-lg-3 col-sm-12">
                    </label>


                    <div class="m-radio-list">
                        <label class="m-radio m-radio--solid m-radio--brand">
                            <input type="radio" name="countryTest" class="countryTest" value="0">
                            Select Country
                            <span></span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div style="margin-left: 18px;" class="input-group date">
                            <select class="selectpicker form-control m-input" data-live-search="true" id="ocountry"
                                    name="ocountry">
                                <option></option>
                                @foreach(@\App\Country::get() as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>




























                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" style="margin-left: 105px;margin-right: 5px;">
                        Location
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input style="margin-left: 40px;" type="text" class="form-control" id="location" name="location" placeholder="Location"/>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" style="margin-left: 105px;margin-right: 5px;">
                        Street Address
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input style="margin-left: 40px;" type="text" class="form-control" id="street_address" name="street_address" placeholder="Street Address"/>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" style="margin-left: 105px;margin-right: 5px;">
                        Postal Code
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input style="margin-left: 40px;" type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code"/>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" style="margin-left: 105px;margin-right: 5px;">
                        City
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input style="margin-left: 40px;" type="text" class="form-control" id="city" name="city" placeholder="City"/>
                    </div>
                </div>




            </div>




            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-brand m-btn--pill">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary m-btn--pill">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            {{--<input  type="radio" name="test" class="radioTest" value="1">--}}
            {{--<input type="radio" name="test" class="radioTest" value="0">--}}
        </form>


        <!--end::Form-->
    </div>
    <!--end::Portlet-->
    <!--begin::Modal-->




@endsection
@section('js')
    <script>
        $(document).on('change', '.regionTest', function () {
            if ($(this).val() == 0) {
                $('#nregion').attr('disabled', true);
                $('#oregion').attr('disabled', false);
            } else if ($(this).val() == 1) {
                $('#nregion').attr('disabled', false);
                $('#oregion').attr('disabled', true);
            }
        })




        $(document).on('change', '.countryTest', function () {
            if ($(this).val() == 0) {
                $('#ncountry').attr('disabled', true);
                $('#ocountry').attr('disabled', false);
            } else if ($(this).val() == 1) {
                $('#ncountry').attr('disabled', false);
                $('#ocountry').attr('disabled', true);
            }
        })
    </script>
@endsection