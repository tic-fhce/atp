@extends('plantilla.admin')

@section('label1')
<div class="col-lg-12">
	<div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Equipo de Trabajo</h1>
          <a href="{{route('usuarios')}}" class="btn btn-warning">Mostrar Todos</a>
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
				            <th>Correo</th>
				            <th>Numero</th>
				            <th></th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php $cant=0;?>
				    	@foreach($usuarios as $value)
				    	<?php $cant=$cant+1;?>
				        <tr>
				        	<td>{{$cant}}</td>
				            <td>{{$value->ci}}</td>
				            <td>{{$value->nombre}} {{$value->ap_paterno}} {{$value->ap_materno}}</td>
				            <td>{{$value->usser}}</td>
				            <td><a href="https://api.whatsapp.com/send?phone={{$value->numero}}" target="_blank" class="btn btn-success">{{$value->numero}}</a></td>
				            <td><a href="{{route('profileequipo',$value->idPersona)}}" class="btn btn-success">Profile</a></td>
				        </tr>
				        @endforeach()
		
        			</tbody>
      			</table>
    		</div>
        </div>
    </section>
</div>

@endsection