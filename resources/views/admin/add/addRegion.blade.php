@extends('admin.layouts.index')
@section('content')
    <!--begin::Portlet-->
    <div class="m-portlet" style="width: auto;">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Add New Region
                    </h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->



        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/storeuser">
            {{ csrf_field() }}
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <label style="width: 930px" class="col-form-label col-lg-3 col-sm-12">
                        First Name
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name"/>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Last Name
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name"/>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Phone
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone"/>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Hire Date
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date">
                            <input type="date" class="form-control m-input" id="hire_date" name="hire_date"/>
                            <div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar"></i>
													</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Salary
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="number" step=0.1 class="form-control m-input" placeholder="salary"
                               id="salary" name="salary"/>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Commission
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date">
                            <input type="number" step=0.01 class="form-control m-input" placeholder="Commission"
                                   id="commission" name="commission"/>
                        </div>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Manager
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date">
                            <select class="selectpicker form-control m-input" data-live-search="true" id="manager" name="manager">
                                <option></option>
                                @foreach(@\App\User::get() as $user)
                                    <option value="{{ $user->id }}">{{ $user->fname . ' ' . $user->lname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Department
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date">
                            <select class="selectpicker form-control m-input" data-live-search="true" id="department" name="department">
                                <option></option>
                                @foreach(@\App\Department::get() as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Job
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date">
                            <select class="selectpicker form-control m-input" data-live-search="true" id="job" name="job">
                                <option></option>
                                @foreach(@\App\Job::get() as $job)
                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Email </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date">
                            <input type="email" class="form-control m-input" placeholder="Email"
                                   id="email" name="email"/>
                            <div class="input-group-append">
													<span class="input-group-text">
														@
													</span>
                            </div>
                        </div>

                    </div>
                </div>





                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Password </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date">
                            <input type="password" class="form-control m-input" placeholder="Password"
                                   id="password" name="password"/>
                            <div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-lock"></i>
													</span>
                            </div>
                        </div>

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
        </form>
        <!--end::Form-->
    </div>
    <!--end::Portlet-->
    <!--begin::Modal-->




@endsection