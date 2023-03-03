<!--- leaflet --->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- waves js -->
<script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- Float Chart js -->
<script src="{{ asset('assets/pages/chart/float/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/curvedLines.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/jquery.flot.tooltip.min.js') }}"></script>
<!-- Chartlist charts -->
<script src="{{ asset('bower_components/chartist/js/chartist.js') }}"></script>
<!-- amchart js -->
<script src="{{ asset('assets/pages/widget/amchart/amcharts.js') }}"></script>
<script src="{{ asset('assets/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('assets/pages/widget/amchart/light.js') }}"></script>
<!-- Custom js -->
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/vertical/vertical-layout.min.js') }}"></script>

<!-- data-table js -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/pages/data-table/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/pages/data-table/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/pages/data-table/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Custom js -->
{{-- <script src="{{ asset('assets/pages/data-table/js/data-table-custom.js') }}"></script> --}}

{{-- <script type="text/javascript" src="{{ asset('assets/pages/dashboard/custom-dashboard.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/js/script.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



@stack('js')
