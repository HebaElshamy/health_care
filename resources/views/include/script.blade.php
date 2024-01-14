<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="{{ asset('assets/') }}/https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('assets/') }}/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('assets/') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('assets/') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="{{ asset('assets/') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('assets/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/') }}/dist/js/pages/dashboard.js"></script>
<!-- Toastr -->
<script src="{{ asset('assets/') }}/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/') }}/dist/js/demo.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
</script>
<script>
    @if(Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right", // تحديد موقع النافذة
                "backgroundColor": "#28a745", // لون الخلفية للرسائل الناجحة
                "color": "#ffffff" // لون النص للرسائل الناجحة
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "backgroundColor": "#dc3545", // لون الخلفية للرسائل ذات الأخطاء
                "color": "#ffffff" // لون النص للرسائل ذات الأخطاء
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "backgroundColor": "#17a2b8", // لون الخلفية للرسائل المعلوماتية
                "color": "#ffffff" // لون النص للرسائل المعلوماتية
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "backgroundColor": "#ffc107", // لون الخلفية للرسائل التحذيرية
                "color": "#000000" // لون النص للرسائل التحذيرية
            }
            toastr.warning("{{ session('warning') }}");
        @endif
</script>

@yield('script')
