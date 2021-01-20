@extends('plantilla.admin')

@section('label1')
	
  <div class="col-md-9">
    <div class="block-web">
      <div class="porlets-content">
        <iframe width="750" height="950" src="{{Storage::url($namepdf->pdf)}}" frameborder="0"></iframe>

      </div><!--/porlets-content-->
    </div><!--/block-web--> 
  </div><!--/col-md-6-->
  
  <div class="col-md-3">
    <div class="block-web">
      <div class="porlets-content">
        @if($datos->pernicion==4 or $datos->pernicion==0)
        <div class="form-group">
          <a href="{{route('editarResepcion',$namepdf->id)}}" class="btn btn-warning btn-lg btn-block">Editar Datos</a>
        </div>

        <div class="form-group">
          <a href="{{route('pdfChange',$namepdf->id)}}" class="btn btn-danger btn-lg btn-block">Cambiar PDF</a>
        </div>
        @endif
          
        <div class="form-group">
          <a href="{{Storage::url($namepdf->pdf)}}" target="_blank" class="btn btn-primary btn-lg btn-block">Descargar</a>
        </div>
         @if($datos->pernicion==2 or $datos->pernicion==0)
        <div class="form-group">
          <a href="{{route('profilepdf',$namepdf->id)}}" class="btn btn-warning btn-lg btn-block">Acciones</a>
        </div>
        @endif
          
      </div>
    </div>
  </div>

@endsection