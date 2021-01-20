@extends('plantilla.admin')

@section('label1')
	<div class="col-md-3"></div>
	<div class="col-md-6">
          <div class="block-web">
            <div class="header">              
              <h3 class="content-header">Registrar Video</h3>
            </div>
            
            <div class="porlets-content">
              <form action="{{route('addVideo')}}" class="form-horizontal row-border" method="POST">
              	@csrf
                <div class="form-group">
                  <label class="col-sm-4 control-label">Titulo</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="titulo" placeholder="Titulo del Video" required="true">
                  </div>
                </div><!--/form-group--> 

                <div class="form-group">
                  <label class="col-sm-4 control-label">Direccion</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="url" placeholder="Direccion" required="true">
                  </div>
                </div><!--/form-group--> 
                
                <div class="bottom">
                  <button type="submit" class="btn btn-primary">Registrar Video </button>
                  <a href="{{route('a69169866ef77e7bb580947a8719892ac8d64efdeiris')}}" class="btn btn-default">Cancel</a>
                </div><!--/form-group-->
              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
    <div class="col-md-3"></div>
@endsection