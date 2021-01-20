@extends('plantilla.admin')

@section('label1')
<div class="col-lg-12">
	<div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Usuarios</h1>
          <a href="{{route('usuarios')}}" class="btn btn-warning">Mostrar Todos</a>
          @foreach($equipos as $value)
          	<a href="{{route('serrarsecionusuarios',$value->id)}}" class="btn btn-danger">{{$value->equipo}}</a>
          @endforeach
          
        </div>
        <div class="pull-right">
        	<div class="form-group">
                <div class="col-sm-12">
                    <form method="post" action="{{route('findUsuario')}}">
                    @csrf
                    	<div class="input-group">
                    		<input type="text" class="form-control" name="ci" required="true" placeholder="Cedula de Identidad">
		                    <div class="input-group-btn">
		                    <button type="submit" class="btn btn-success ">Buscar</button>
		                    </div>		
                    	</div>	
                    </form>
                </div>
            </div><!--form-group-->
        </div>
    </div>

    <section class="panel default blue_title h2">
        <div class="panel-body">
         	<div class="table-responsive">
         		@if(session('mensaje_error'))
			        <div class="alert alert-danger" role="alert">
			            {{session('mensaje_error')}}
			        </div>
			    @endif

      			<table class="table table-bordered">
			        <thead>
			          	<tr>
			          		<th>#</th>
			            	<th>C.I.</th>
				            <th>Usuario</th>
				            <th>Equipo</th>
				            <th>Estado</th>				            
				            <th>Disponible</th>
				            <th>Modificado</th>
				            <th>Correo</th>
				            <th>Numero</th>
				            <th></th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php $cant=0;?>
				    	@foreach($usuarios as $value)
				    	<?php 
				    		$cant=$cant+1;
				    		$ingreso=$value->ingreso;
				    		$ingreso=substr($ingreso,11);
				    	?>
				        @if($value->estado=='1') 
				        <tr class="alert alert-success">
				        @else
				        <tr>
				        @endif
				           	<td>{{$cant}}</td>
				            <td>{{$value->ci}}</td>
				            <td>{{$value->nombre}} {{$value->ap_paterno}} {{$value->ap_materno}}</td>
				            <td>{{$value->equipo}}</td>
				            <td>{{$value->estado}}</td>
				            <td>{{$value->disponible}}</td>
				            <td><a href="{{route('quitarusuarios',$value->idUsuario)}}">{{$ingreso}}</a></td>
				            <td>{{$value->usser}}</td>
				            <td><a href="https://api.whatsapp.com/send?phone={{$value->numero}}" target="_blank" class="btn btn-success">{{$value->numero}}</a></td>
				            <td><a href="{{route('profileusuarios',$value->idPersona)}}" class="btn btn-success">Profile</a></td>
				        </tr>
				        @endforeach()
		
        			</tbody>
      			</table>
    		</div>
        </div>
    </section>
</div>

@endsection