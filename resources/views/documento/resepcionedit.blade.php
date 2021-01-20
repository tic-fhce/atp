@extends('plantilla.admin')

@section('label1')
	<div class="col-md-3"></div>
	<div class="col-md-6">
          <div class="block-web">
            <div class="header">              
              <h3 class="content-header">Recepción de Documentos</h3>
            </div>

            <div class="porlets-content">
              <form action="{{route('UpdateResepcion',$doc->id)}}" class="form-horizontal row-border" method="POST" enctype="multipart/form-data">
                @method('PUT')
              	@csrf
                <div class="form-group">
                  <label class="col-sm-4 control-label">N° Hoja de Ruta :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nhojaruta" value="{{$doc->nhojaruta}}" required="true">
                    <input type="hidden" name="id_usuario" value="{{$datos->idusuario}}">
                  </div>
                </div><!--/form-group--> 

                <div class="form-group">
                  <label class="col-sm-4 control-label">Fecha creación de Documento</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="fecha_documento" value="{{$doc->fecha_documento}}" required="true">
                  </div>
                </div><!--/form-group--> 

                <div class="form-group">
                  <label class="col-sm-4 control-label">Referencia :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="referencia" value="{{$doc->referencia}}" required="true">
                  </div>
                </div><!--/form-group--> 

                <div class="form-group">
                  <label class="col-sm-4 control-label">Numero de Hojas :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="numerohojas" value="{{$doc->numerohojas}}" required="true">
                  </div>
                </div><!--/form-group-->

                <div class="form-group">
                   <hr>
                  <label class="col-sm-4 control-label">Enviar a :</label>
                  <div class="col-sm-8">
                    <select class="form-control" required="true" name="id_unidad">
                      <option value="">{{$doc->nombre}}</option>
                        @foreach($unidades as $value)
                          <option value="{{$value->id}}">{{$value->nombre}}</option>
                        @endforeach()
                    </select>
                  </div>
                </div><!--/form-group-->

                <div class="form-group">
                  <hr>
                  
                </div>

                <div class="bottom">
                  <button type="submit" class="btn btn-primary">Actualizar Resepcion</button>
                  <a href="{{route('a69169866ef77e7bb580947a8719892ac8d64efdeiris')}}" class="btn btn-default">Cancel</a>
                </div><!--/form-group-->
              </form>
            </div><!--/porlets-content-->

          </div><!--/block-web--> 
        </div><!--/col-md-6-->
    <div class="col-md-3"></div>
@endsection