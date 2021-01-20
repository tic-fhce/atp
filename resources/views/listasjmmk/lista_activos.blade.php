@extends('plantilla.admin')

@section('label1')
<div class="col-lg-12">
	<div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Usuarios Activos</h1>
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
		                    	<button type="submit" class="btn btn-success">Buscar</button>
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
			            	<th>C.I.</th>
				            <th>Usuario</th>
				            <th>Equipo</th>
				            <th>Estado</th>				            
				            <th>Activo</th>
				            <th>Numero</th>				            
				        </tr>
				    </thead>
				    <tbody>
				    	@foreach($usuarios as $value)
				    	@if($value->pernicion!=0)
				        <tr>
				            <td>{{$value->ci}}</td>
				            <td>{{$value->nombre}} {{$value->ap_paterno}} {{$value->ap_materno}}</td>			            
				            <td>{{$value->equipo}}</td>
				            <td>
				            	@if($value->disponible==1)
				            		Disponible
				            	@else
				            		Atendiendo Llamada
				            	@endif
				            </td>
				            <td>Usuario Activo</td>
				            <td><a href="https://api.whatsapp.com/send?phone={{$value->numero}}" target="_blank" class="btn btn-success"> {{$value->numero}}</a></td>
				        </tr>
				        @endif
				        @endforeach()
		
        			</tbody>
      			</table>
    		</div>
        </div>
    </section>
    <script type="text/javascript">
   		setTimeout( function() { window.location.reload(); }, 30000 );
	</script>
</div>

@endsection