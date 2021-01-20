@extends('plantilla.admin')

@section('label1')
	<div class="col-md-3"></div>
  <div class="col-md-6">
          <div class="block-web">
            <div class="header">              
              <h3 class="content-header">Registro de Atencion</h3>
            </div>
            
            <div class="porlets-content">
              <form action="{{route('addAtencion')}}" class="form-horizontal row-border" method="POST">
                @csrf

                <div class="form-group">
                  <label class="col-sm-4 control-label">Sexo</label>
                  <div class="col-sm-8">
                    <select name="sexo" required="true">
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                    </select>
                  </div>
                </div><!--/form-group--> 
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Celular</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="celular" value="591" required="true">
                  </div>
                </div><!--/form-group--> 
                
                <div class="bottom">
                  <button type="submit" class="btn btn-primary">Registrar Atencion</button>
                  <a href="{{route('a69169866ef77e7bb580947a8719892ac8d64efdeiris')}}" class="btn btn-default">Cancelar</a>
                </div><!--/form-group-->
              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
    <div class="col-md-3"></div>        
@endsection