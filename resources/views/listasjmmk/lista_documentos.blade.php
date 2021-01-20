@extends('plantilla.admin')

@section('label1')
<div class="col-lg-12">
	<div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Notas de la Unidad</h1>
          <a href="{{route('listar_documentos',$redac)}}" class="btn btn-warning">Mostrar Todos</a>
        </div>
        <div class="pull-right">
        	<div class="form-group">
                <div class="col-sm-12">
                    <form method="post" action="{{route('findDoc',$redac)}}">
                    @csrf
                    <table>
                    	<tr>
                    		<td>
		                    	<select  name="atrib" required="true">
		                    		<option value="">Buscar por</option>
		                    		<option value="1">Fecha</option>
		                    		<option value="2">Dirigido A:</option>
		                    		<option value="3">Referencia</option>
		                    	</select>
                    		</td>
                    		<td>
		                    	<input type="text" class="form-control" name="atrib2" required="true">	
                    		</td>
                    		<td>
				                <input type="submit" class="btn btn-success" value="Buscar">	
				            </td>
                    	</tr>
                    </table>
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
			            	<th>N° Correlativo</th>
				            <th>Fecha</th>
				            <th>Dirigido A</th>
				            <th>Referencia</th>
				            <th></th>
				        </tr>
				    </thead>
				    <tbody>
				    	@foreach($doc as $value)
				        <tr>
				            <td>{{$value->correlativo}}</td>
				            <td>{{$value->fecha}}</td>
				            <td>{{$value->A}}</td>
				            <td>{{$value->ref}}</td>
				            <td><a href="{{route('vistaprevia',$value->id)}}" class="btn btn-success">Ver Documento</a></td>
				        </tr>
				        @endforeach()
		
        			</tbody>
      			</table>
    		</div>
        </div>
    </section>
</div>

@endsection