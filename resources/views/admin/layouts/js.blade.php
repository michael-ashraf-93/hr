<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ url('admin/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
{{--<script src="{{ url('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>--}}
{{--<script src="{{ url('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>--}}
<!-- jQuery Knob Chart -->
<script src="{{ url('admin/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('admin/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<!-- datepicker -->
<script src="{{ url('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ url('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
{{--<script src="{{ url('admin/dist/js/adminlte.js') }}"></script>--}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('admin/dist/js/demo.js') }}"></script>

<script src="{{ url('admin/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>



<!-- bootstrap color picker -->
<script src="{{ url('admin/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>


<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ url('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ url('admin/plugins/select2/select2.full.min.js') }}"></script>
<!-- InputMask -->
{{--<script src="{{ url('admin/plugins/input-mask/jquery.inputmask.js') }}"></script>--}}
{{--<script src="{{ url('admin/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>--}}
{{--<script src="{{ url('admin/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>--}}

<!-- bootstrap time picker -->
{{--<script src="{{ url('admin/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>--}}

<!-- iCheck 1.0.1 -->
{{--<script src="{{ url('admin/plugins/iCheck/icheck.min.js') }}"></script>--}}

<!-- AdminLTE App -->
<script src="{{ url('admin/dist/js/adminlte.min.js') }}"></script>



<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()



        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

//Date range picker
        $('#reservation').daterangepicker()
        $('#reservation2').timepicker()
        $('#reservationtime').daterangepicker({
            timePicker         : true,
            timePickerIncrement: 30,
            format             : 'MM/DD/YYYY h:mm A'
        })
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
    })
</script>


</body>
</html>
