@extends('plantilla.admin')

@section('label1')
	<div class="col-md-3"></div>
	<div class="col-md-6">
          <div class="block-web">
            <div class="header">              
              <h3 class="content-header">Registro de Usuario</h3>
            </div>
            
            <div class="porlets-content">
              <form action="{{route('addUsuario')}}" class="form-horizontal row-border" method="POST">
              	@csrf
                <div class="form-group">
                  <label class="col-sm-4 control-label">Cedula de Identidad</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="ci" placeholder="Cedula de Identidad" required="true">
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
                  <label class="col-sm-4 control-label">E-mail</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="correo" placeholder="E-mail" required="true">
                  </div>
                </div><!--/form-group--> 
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Celular</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="celular" placeholder="Celular" required="true">
                  </div>
                </div><!--/form-group--> 

                <div class="form-group">
                  <label class="col-sm-4 control-label">Celular Asignado</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="numero" value="591" required="true">
                  </div>
                </div><!--/form-group--> 
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Equipo</label>
                  <div class="col-sm-8">
                    <select class="form-control" required="true" name="equipo">
                      <option>Seleccionar Equipo</option>
                      @foreach($equipo as $value)
                        <option value="{{$value->id}}">{{$value->equipo}}</option>
                      @endforeach()
                    </select>
                  </div>
                </div><!--/form-group-->

                <div class="form-group">
                  <label class="col-sm-4 control-label">Sexo</label>
                  <div class="col-sm-8">
                    <select class="form-control" required="true" name="sexo">
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                      
                    </select>
                  </div>
                </div><!--/form-group--> 
                
                <div class="bottom">
                  <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                  <a href="{{route('a69169866ef77e7bb580947a8719892ac8d64efdeiris')}}" class="btn btn-default">Cancel</a>
                </div><!--/form-group-->
              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
    <div class="col-md-3"></div>
@endsection