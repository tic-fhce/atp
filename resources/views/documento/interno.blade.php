@extends('plantilla.admin')

@section('label1')
	
<div class="col-lg-12">
	<div class="pull-left breadcrumb_admin clear_both">
   	<div class="pull-left page_title theme_color">
      @if($redac['cad']==0)
   		 <h1>Nota Interna</h1>
      @endif
      @if($redac['cad']==1)
        <h1>Nota Con Visto Bueno</h1>
      @endif

      @if($redac['cad']==2)
        <h1>Nota Vacia</h1>
        sin final de firmas y conclusion de redaccion 
      @endif
   	</div>
  </div>

  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="block-web">
      <div class="porlets-content">
        <form action="{{route('notaInterna',$redac)}}" class="form-horizontal row-border" method="POST">
          @csrf
          <div class="form-group">
            La Paz, <input type="date" name="fecha" required="true">
          </div>

          <div class="form-group">
            UMSA.FHCE.{{$datos->unidad}} N° {{$redac['correlativo']+1}}/{{date('Y')}}
          </div>

          <div class="form-group">
            <label class="col-sm-1 control-label">A : </label>
            <div class="col-sm-11">
              <input type="text" class="form-control" name="a" placeholder="Ejemplo : M. Sc. María Eugenia Pareja Tejada" required="true">
              <input type="text" class="form-control" name="cargo" placeholder="Ejemplo : DECANA  FACULTAD DE HUMANIDADES Y CIENCIAS  DE LA EDUCACIÓN" required="true">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-1 control-label">Ref : </label>
            <div class="col-sm-11">
              <input type="text" class="form-control" name="ref" placeholder="Referencia" required="true">
            </div>
          </div>

          <div class="form-group">
            <u>Presente</u>.-<br><br>
            De mi mayor consideración:
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <textarea class="form-control ckeditor" name="cuerpo" rows="10">
                @if($redac['cad']!=2)
                  A tiempo de felicitarle y desearle éxitos en sus labores diarias nos dirigimos a usted con el fin de
                @endif
              </textarea>
            </div>
          </div>
          <div class="form-group">
            @if($redac['cad']!=2)
              Con este particular motivo saludo a usted con las consideraciones más distinguidas.
            @endif
          </div>
        
          <div class="bottom">
            <button type="submit" class="btn btn-success">Crear Nota</button>
            <a href="{{route('redaccion',$redac)}}" class="btn btn-default">Cancelar</a>
          </div><!--/form-group-->
        </form>
      </div><!--/porlets-content-->
    </div><!--/block-web--> 
  </div><!--/col-md-6-->

  <div class="col-md-2"></div>
</div>

@endsection

<script type="text/javascript" src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>