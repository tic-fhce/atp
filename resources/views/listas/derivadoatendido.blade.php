@extends('plantilla.admin')

@section('label1')
<div class="col-lg-12">
	<div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Mis Casos Derivados Atendidos</h1>
          <a href="#" class="btn btn-warning">Mostrar Todos</a>
        </div>
        <div class="pull-right">
        	<div class="form-group">
                <div class="col-sm-12">
                    <form action="#">
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
			          		<th>ID</th>
			            	<th>C.I.</th>
				            <th>Nombre</th>
				            <th>Obs</th>
				            <th>Estado</th>
				            <th>Fecha</th>
				            <th>Derivado Por</th>
				            <th></th>
				        </tr>
				    </thead>
				    <tbody>
				    @foreach($derivadosatendidos as $value)
				        <tr>
				        	<td>{{$value->idpersona}}</td>
				            <td>{{$value->ci}}</td>
				            <td>{{$value->nombre}}</td>
				            <td>{{$value->obs}}</td>
				            <td>{{$value->tipo}}</td>
				            <td>{{$value->created_at}}</td>
				            <td>{{$value->atendio}}<br>{{$value->equipo}}</td>
				            <td><a href="{{route('profileconsultorio',$value->idpersona)}}" class="btn btn-success">Seguimiento</a></td>
				        </tr>
				    @endforeach()	
		
        			</tbody>
      			</table>
    		</div>
        </div>
    </section>
</div>

@endsection