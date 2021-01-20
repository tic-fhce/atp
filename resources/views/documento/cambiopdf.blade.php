@extends('plantilla.admin')

@section('label1')
	<div class="col-md-3"></div>
	<div class="col-md-6">
          <div class="block-web">
            <div class="header">              
              <h3 class="content-header">Remplazo de PDF</h3>
            </div>

            <div class="porlets-content">
              <form action="{{route('UpdateResepcionpdf',$id)}}" class="form-horizontal row-border" method="POST" enctype="multipart/form-data">
              	@csrf
                <div class="form-group">
                  <hr>
                  <label class="col-sm-4 control-label">Documento Digital</label>
                  <div class="col-sm-8">
                    <input type="file" name="pdf" required="true">
                  </div>
                 
                </div><!--/form-group-->

                <div class="form-group">
                  <hr>
                  
                </div>

                <div class="bottom">
                  <button type="submit" class="btn btn-primary">Cargar Nuevo PDF</button>
                  <a href="{{route('a69169866ef77e7bb580947a8719892ac8d64efdeiris')}}" class="btn btn-default">Cancel</a>
                </div><!--/form-group-->
              </form>
            </div><!--/porlets-content-->

          </div><!--/block-web--> 
        </div><!--/col-md-6-->
    <div class="col-md-3"></div>
@endsection