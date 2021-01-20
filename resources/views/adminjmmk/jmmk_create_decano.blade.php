@extends('plantilla.admin')

@section('label1')
	<div class="col-md-3"></div>
	<div class="col-md-6">
          <div class="block-web">
            <div class="header">              
              <h3 class="content-header">Registro de Decano</h3>
            </div>
            <div class="porlets-content">
              <form action="{{route('addDecano')}}" class="form-horizontal row-border" method="POST">
              	@csrf

                <div class="form-group">
                  <label class="col-sm-4 control-label">Tipo</label>
                  <div class="col-sm-8">
                    <select class="form-control" required="true" name="tipo">
                      <option>Seleccionar Tipo de Cargo</option>
                        <option value="DECANO">DECANO</option>
                        <option value="DECANA">DECANA</option>
                        <option value="DECANO (a.i)">DECANO (a.i)</option>
                        <option value="DECANA (a.i)">DECANA (a.i)</option>
                    </select>
                  </div>
                </div><!--/form-group--> 

                <div class="form-group">
                  <label class="col-sm-4 control-label">Nombres</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombres" required="true">
                  </div>
                </div><!--/form-group--> 
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Ap. Paterno </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="ap_paterno" placeholder="Apellido Paterno">
                  </div>
                </div><!--/form-group--> 
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Ap. Materno</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="ap_materno" placeholder="Apellido Materno">
                  </div>
                </div><!--/form-group--> 


                <div class="form-group">
                  <label class="col-sm-4 control-label">Grado Académico</label>
                  <div class="col-sm-8">
                    <select class="form-control" required="true" name="grado">
                      <option>Seleccionar Grado Académico</option>
                      @foreach($grado as $value)
                        <option value="{{$value->id}}">{{$value->descripcion}}</option>
                      @endforeach()
                    </select>
                  </div>
                </div><!--/form-group-->

                
                
                <div class="bottom">
                  <button type="submit" class="btn btn-primary">Registrar Decano</button>
                  <a href="{{route('a69169866ef77e7bb580947a8719892ac8d64efdeiris')}}" class="btn btn-default">Cancel</a>
                </div><!--/form-group-->
              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
    <div class="col-md-3"></div>
@endsection