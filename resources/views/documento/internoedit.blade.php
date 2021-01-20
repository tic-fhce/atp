@extends('plantilla.admin')

@section('label1')
	
<div class="col-lg-12">
	<div class="pull-left breadcrumb_admin clear_both">
   	<div class="pull-left page_title theme_color">
      
   	</div>
  </div>

  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="block-web">
      <div class="porlets-content">
        <form action="{{route('UpdateNota',$idTIC)}}" class="form-horizontal row-border" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            La Paz, <input type="date" name="fecha" value="{{$doc->fecha}}" required="true">
          </div>

          <div class="form-group">
            UMSA.FHCE.{{$datos->unidad}} N° 0{{$doc->correlativo}}/{{substr($doc->fecha,0,4)}}
          </div>

          <div class="form-group">
            <label class="col-sm-1 control-label">A : </label>
            <div class="col-sm-11">
              <input type="text" class="form-control" name="a" value="{{$doc->A}}" required="true">
              <input type="text" class="form-control" name="cargo" value="{{$doc->cargo}}" required="true">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-1 control-label">Ref : </label>
            <div class="col-sm-11">
              <input type="text" class="form-control" name="ref" value="{{$doc->ref}}" required="true">
            </div>
          </div>

          <div class="form-group">
            <u>Presente</u>.-<br><br>
            De mi mayor consideración:
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <textarea class="form-control ckeditor" name="cuerpo" rows="10"><?php echo($doc->cuerpo);?></textarea>
            </div>
          </div>
          <div class="form-group">
            Con este particular motivo saludo a usted con las consideraciones más distinguidas.
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label"><strong> Cambiar nota A : </strong></label>
            <div class="col-sm-9">
              <select name="cad">
                <option value="{{$doc->cad}}">
                  Nota Actual
                  @if($doc->cad==0)
                    Interna
                  @endif
                  @if($doc->cad==1)
                    Con VoBo
                  @endif
                  @if($doc->cad==2)
                    Vacia
                  @endif
                </option>
                <option value="0">Nota Interna</option>
                <option value="1">Nota con VoBo</option>
                <option value="2">Nota Vacia</option>
              </select>
            </div>
          </div>
        
          <div class="bottom">
            <button type="submit" class="btn btn-success">Actualizar Nota</button>
            <a href="{{route('menu_documento')}}" class="btn btn-default">Cancelar</a>
          </div><!--/form-group-->
        </form>
      </div><!--/porlets-content-->
    </div><!--/block-web--> 
  </div><!--/col-md-6-->

  <div class="col-md-2"></div>
</div>

@endsection

<script type="text/javascript" src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>