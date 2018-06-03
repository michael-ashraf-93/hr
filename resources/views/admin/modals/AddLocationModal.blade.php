<div class="modal fade" id="AddRegionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Region</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/region/store">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Region">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-globe"></i>
                        </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-btn--pill">
                        Submit
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>

                </form>





            </div>

        </div>
    </div>
</div>




<div class="modal fade" id="AddCountryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/store_country">
                    {{ csrf_field() }}

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Country">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-map-o"></i>
                        </span>
                        </div>
                    </div>



                    <div class="input-group mb-3">
                        <select class=" form-control m-input"  id="region"
                                name="region">
                            <option>Region</option>
                            @foreach(@\App\Region::get() as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary m-btn--pill">
                        Submit
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>