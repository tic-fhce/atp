@extends('plantilla.admin')

@section('label1')
<div class="col-lg-12">
    <section class="panel default blue_title h2">
        <div class="panel-heading">Equipos 

        </div>
        
        <div class="panel-body">
         	<div class="table-responsive">
      			<table class="table table-bordered">
			        <thead>
			          	<tr>			            	
				            <th>ID</td>
				            <th>Nombre</th>
				            <th>Opciones</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@foreach($equipo as $value)
				        <tr>
				            <td>{{$value->id}}</td>
				            <td>{{$value->equipo}}</td>				            
				            <td><a href="#" class="btn btn-success">Opciones</a></td>
				        </tr>
				        @endforeach()
		
        			</tbody>
      			</table>
    		</div>
        </div>
    </section>
</div>

@endsection