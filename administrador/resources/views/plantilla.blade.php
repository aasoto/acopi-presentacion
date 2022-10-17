<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ACOPIsoft | CMS</title>
    <link rel="shortcut icon" href="{{url('/')}}/vistas/images/logo-acopi-pestana.png">

	<!--==================================
	=            Plugins HTML            =
	===================================-->
	{{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/bootstrap.min.css">
	<!-- DataTables-->
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/fontawesome-free/css/all.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  	<!-- overlayScrollbars -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  	{{-- TAGS INPUT --}}
  	@if (Route::has('login'))
  		@auth
  		@if (Auth::user()->modo == 'Nocturno')
	  		<link rel="stylesheet" href="{{ url('/') }}/css/plugins/tagsinput-dark.css">
	  		{{-- SUMMERNOTE --}}
			<link rel="stylesheet" href="{{ url('/') }}/css/plugins/summernote-dark.css">
		@else
	  		<link rel="stylesheet" href="{{ url('/') }}/css/plugins/tagsinput.css">
	  		{{-- SUMMERNOTE --}}
			<link rel="stylesheet" href="{{ url('/') }}/css/plugins/summernote.css">
	  	@endif
  	@else
  		<link rel="stylesheet" href="{{ url('/') }}/css/plugins/tagsinput.css">
  		{{-- SUMMERNOTE --}}
		<link rel="stylesheet" href="{{ url('/') }}/css/plugins/summernote.css">
		@endauth
  	@endif


	<!--Slider-->
    <link rel="stylesheet" href="{{ url('/') }}/css/plugins/owl.carousel.css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/plugins/owl.theme.css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/plugins/owl.transitions.css" />
	<!-- SweetAlert2 -->
  	{{--<link rel="stylesheet" href="{{ url('/') }}/css/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">--}}
  	<!-- Theme style | CSS de AdminLTE -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/css/adminlte.min.css">
  	<!-- FullCalendar -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/fullcalendar/main.css">
  	<!-- Select2 -->
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/select2/css/select2.min.css">
  	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- uPlot -->
    <link rel="stylesheet" href="{{ url('/') }}/css/plugins/uplot/uPlot.min.css">
    <!--====  End of Plugins HTML  ====-->

	<!--==========================================
	=            Plugins JavaScript            =
	==========================================-->
	{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
	<script src="{{ url('/') }}/js/plugins/bootstrap.bundle.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/jquery.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/popper.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="{{ url('/') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/jszip/jszip.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="{{ url('/') }}/js/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- overlayScrollbars -->
	<script src="{{ url('/') }}/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	{{-- TAGS INPUT --}}
	{{-- https://www.jqueryscript.net/form/Bootstrap-4-Tag-Input-Plugin-jQuery.html --}}
	<script src="{{ url('/') }}/js/plugins/tagsinput.js"></script>
	{{-- SUMMERNOTE --}}
	{{-- https://summernote.org/ --}}
	<script src="{{ url('/') }}/js/plugins/summernote.js"></script>
    <!-- AdminLTE App -->
	<script src="{{ url('/') }}/js/plugins/adminlte/adminlte.js"></script>
	<script src="{{ url('/') }}/js/plugins/adminlte/demo.js"></script>
	<!-- Sweetalert-->
	{{--<script src="{{ url('/') }}/js/plugins/sweetalert.min.js"></script>--}}
	@if (Route::has('login'))
		@auth
		@if (Auth::user()->modo == 'Nocturno')
			<script src="{{ url('/') }}/js/plugins/sweetalert-dark.js"></script>
		@else
			<script src="{{ url('/') }}/js/plugins/sweetalert.js"></script>
		@endif
	@else
		<script src="{{ url('/') }}/js/plugins/sweetalert.js"></script>
		@endauth
	@endif


	<!-- owl-carousel -->
    <script src="{{ url('/') }}/js/plugins/owl.carousel.min.js"></script>
    <!-- Moment -->
    <script src="{{ url('/') }}/js/plugins/moment/moment.min.js"></script>
    <!-- FullCalendar -->
    <script src="{{ url('/') }}/js/plugins/fullcalendar/main.js"></script>
    <script src="{{ url('/') }}/js/plugins/fullcalendar/locales/es.js"></script>
    <!-- Select2 -->
    <script src="{{ url('/') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<!-- SweetAlert2 -->
	{{--<script src="{{ url('/') }}/js/plugins/sweetalert2/sweetalert2.min.js"></script>--}}
    <!-- ChartJS -->
    <script src="{{ url('/') }}/js/plugins/chart.js/Chart.min.js"></script>
    <!-- uPlot -->
    <script src="{{ url('/') }}/js/plugins/uplot/uPlot.iife.min.js"></script>
	<!--=====  End of Plugins JavaScript  ======-->

</head>
@if (Route::has('login'))
	@auth
		<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed" id="cuerpoPagina">
			<div class="wrapper">
				@include('modulos.preloading')
				@include('modulos.header')
				@include('modulos.sidebar')
				@yield('content')
				@include('modulos.footer')
			</div>
			<input type="hidden" id="ruta" value="{{ url('/') }}">
			<script src="{{url('/')}}/js/codigo.js"></script>
			<script src="{{url('/')}}/js/ownDatatables.js"></script>
			<script src="{{url('/')}}/js/calendarios.js"></script>
			<script src="{{url('/')}}/js/colorPicker.js"></script>
			<script src="{{url('/')}}/js/archivos.js"></script>
            <script src="{{url('/')}}/js/indicadores-pagos.js"></script>
            <script src="{{url('/')}}/js/indicadores-empresas.js"></script>
			@if (Auth::user()->modo == 'Nocturno')
				<script src="{{url('/')}}/js/modoNocturno.js"></script>
			@endif
		</body>
	@else
		@include('paginas.pagina_web.login')
	@endauth
@endif
</html>
