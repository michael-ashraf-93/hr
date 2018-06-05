<link rel="stylesheet" href="{{ url('admin/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
<div class="modal fade" id="add-new-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form class="m-form m-form--fit m-form--label-align-right orm-horizontal" method="POST"
                      action="/task/store">
                    {{ csrf_field() }}
                    <div class="card-body">

                        <div class="form-group">
                            <label for="title" class="control-label">Title</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="title" name="title" required>
                                <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-tasks"></i>
                        </span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="body" class="control-label">Body</label>
                            <div class="input-group">
                                <textarea type="text" class="form-control" id="body" name="body" required></textarea>
                                <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-file-text-o"></i>
                        </span>
                                </div>
                            </div>
                        </div>


                        {{--<div class="form-group">--}}
                        {{--<label for="date" class="control-label">Date</label>--}}
                        {{--<div class="input-group">--}}
                        {{--<input type="date" class="form-control" id="Date" name="date" required>--}}
                        {{--<div class="input-group-append">--}}
                        {{--<span class="input-group-text">--}}
                        {{--<i class="fa fa-calendar"></i>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="reservation" name="date">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Time picker:</label>

                            <div class="input-group">
                                <input type="text" class="form-control timepicker">

                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>


                        {{--<div class="bootstrap-timepicker">--}}
                        {{--<div class="form-group">--}}
                        {{--<label>Time picker:</label>--}}

                        {{--<div class="input-group">--}}
                        {{--<input type="text" class="form-control timepicker">--}}

                        {{--<div class="input-group-append">--}}
                        {{--<span class="input-group-text"><i class="fa fa-clock-o"></i></span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- /.input group -->--}}
                        {{--</div>--}}
                        {{--<!-- /.form group -->--}}
                        {{--</div>--}}


                        <div class="form-group">
                            <label for="type" class="control-label">Background Color</label>
                            <div class="input-group">
                                <input type="text" class="form-control my-colorpicker1" id="back" name="back"
                                       value="#ffffff" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="control-label">Text Color</label>
                            <div class="input-group">
                                <input type="text" class="form-control my-colorpicker1" id="text" name="text"
                                       value="#000000" required>
                            </div>
                        </div>

                        <div class="card-body">
                            <button type="submit" class="btn btn-primary m-btn--pill">
                                Submit
                            </button>
                            <button id="goBack" type="button" class="btn btn-secondary m-btn--pill" data-dismiss="modal"
                                    aria-label="Close">
                                Cancel
                            </button>
                        </div>

                    </div>

                </form>


            </div>
        </div>
    </div>
</div>


{{--@section('js')--}}
{{--<script>--}}
{{--n = new Date();--}}
{{--y = n.getFullYear();--}}
{{--m = n.getMonth();--}}
{{--d = n.getDate();--}}
{{--//    alert(y + "-" + m + "-" + d)--}}
{{--$('#Date').val(m + "-" + d + "-" + y)--}}
{{--//    document.getElementById("Date").val = y + "-" + m + "-" + d;--}}
{{--</script>--}}

{{--<script type="text/javascript">--}}
{{--$(function () {--}}
{{--$('#datetimepicker1').datetimepicker();--}}
{{--});--}}
{{--</script>--}}
{{--@endsection--}}

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>