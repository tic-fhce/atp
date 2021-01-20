@extends('plantilla.admin')

@section('label1')
	
  <div class="col-md-9">
    <div class="block-web">
      <div class="porlets-content">
        <iframe width="750" height="950" src="{{asset($namepdf)}}" frameborder="0"></iframe>
      </div><!--/porlets-content-->
    </div><!--/block-web--> 
  </div><!--/col-md-6-->
  
  <div class="col-md-3">
    <div class="block-web">
      <div class="porlets-content">
        <div class="form-group">
          <a href="{{route('editar',$idTIC)}}" class="btn btn-warning btn-lg btn-block">Editar</a>
        </div>
          
        <div class="form-group">
          <a href="{{asset($namepdf)}}" target="_blank" class="btn btn-primary btn-lg btn-block">Descargar</a>
        </div>
          
      </div>
    </div>
  </div>

@endsection