<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Copyright &copy; 2020 Online Library Management System | <a href="#" target="_blank"> Designed by : Tran
                    Quang Khuong</a>
            </div>

        </div>
    </div>
</section>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('adminlte-v3/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('adminlte-v3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte-v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte-v3/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('adminlte-v3/dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('adminlte-v3/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('adminlte-v3/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('adminlte-v3/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('adminlte-v3/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte-v3/plugins/chart.js/Chart.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('adminlte-v3/dist/js/pages/dashboard2.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.btn-delete').click(function(event) {
            let isDelete = confirm('Bạn có muốn xóa sách này ?');
            if (!isDelete) {
                event.preventDefault();
            }
        });
    });
</script>
