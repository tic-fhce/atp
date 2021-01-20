<!DOCTYPE HTML>
<html>
	<head>
		<title>CAI-COVID</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/notic.css')}}" />

		<link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/admin.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/jquerysctipttop.css')}}" rel="stylesheet" type="text/css">
	</head>
	<body class="light_theme  fixed_header left_nav_fixed">
		<div class="wrapper">
			<div class="header_bar">
				@include('plantilla.cabecera')
			</div>

			<div class="inner">
				<div class="left_nav">
					<div class="search_bar"> <i class="fa fa-search"></i>
				        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
				    </div>
				    @include('plantilla.menu')
				</div>

				<div class="contentpanel">
					<div class="pull-left breadcrumb_admin clear_both">
				    
				    </div>


					<div class="container clear_both padding_fix">
						<div class="row">
							@yield('label1')
						</div>
					</div>
				</div>

			</div>
		</div>

		<script src="{{asset('assets/js/jquery-2.1.0.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/js/common-script.js')}}"></script>
		<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>
		<script src="{{asset('assets/js/sparkline-chart.js')}}"></script>
		<script src="{{asset('assets/js/graph.js')}}"></script>
		<script src="{{asset('assets/js/edit-graph.js')}}"></script>
		<script src="{{asset('assets/plugins/kalendar/kalendar.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/plugins/kalendar/edit-kalendar.js')}}" type="text/javascript"></script>

		<script src="{{asset('assets/plugins/sparkline/jquery.sparkline.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/plugins/sparkline/jquery.customSelect.min.js')}}" ></script> 
		<script src="{{asset('assets/plugins/sparkline/sparkline-chart.js')}}"></script> 
		<script src="{{asset('assets/plugins/sparkline/easy-pie-chart.js')}}"></script>
		<script src="{{asset('assets/plugins/morris/morris.min.js')}}" type="text/javascript"></script> 
		<script src="{{asset('assets/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>  
		<script src="{{asset('assets/plugins/morris/morris-script.js')}}"></script> 

		<script src="{{asset('assets/js/jPushMenu.js')}}"></script> 
		<script src="{{asset('assets/js/side-chats.js')}}"></script>
		<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets/plugins/scroll/jquery.nanoscroller.js')}}"></script>

		@yield('script')

	</body>
</html>