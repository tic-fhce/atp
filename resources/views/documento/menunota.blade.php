@extends('plantilla.admin')

@section('label1')
	
	<div class="col-lg-12">
		<div class="pull-left breadcrumb_admin clear_both">
        	<div class="pull-left page_title theme_color">
          		<h1>Predefinidos</h1>
        	</div>
    	</div>

    	<div class="col-md-4 col-sm-6">
            <a href="{{route('interno',$redac)}}">
            	<div class="block-web"> 
            		<h5 class="content-header">Interna</h5>
              		<img src="{{asset('images/1_1.jpg')}}" >
            	</div>
           	</a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="{{route('vobo',$redac)}}">
            	<div class="block-web">
              		<h5 class="content-header">VoBo.</h5>
              		<img src="{{asset('images/1_2.jpg')}}" >
            	</div>
           	</a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="{{route('vacio',$redac)}}">
            	<div class="block-web"> 
              		<h5 class="content-header">Vacío</h5>
              		<img src="{{asset('images/1_3.jpg')}}" >
            	</div>
            </a>
        </div>
    </div>

@endsection