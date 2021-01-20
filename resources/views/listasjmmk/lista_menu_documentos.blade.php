@extends('plantilla.admin')

@section('label1')
<div class="col-lg-12">
	<div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Documentos Disponibles</h1>
        </div>
    </div>

    @foreach($TipoDocumento as $value)

        <div class="col-md-3 col-sm-6">
            <div class="widgets_user">
                <div class="stat-label">N° {{$value->correlativo}}</div>
                <div class=""> <i class="fa fa-user"></i> {{$value->detalle}}</div>
                <div class="system_bg">
                    <div class="centered-container">
                        <div class="information_inner">
                            <div class="infos"><i class="class fa  fa-book icon"></i></div>
                        </div>
                      
                    </div>
                </div>

                <div class="system_bg">
                    <div class="btn-large">
                        <?php $redac=array('id'=>$value->id,'idunidad'=>$value->id_unidad,'idcorrealtivo'=>$value->id_correaltivo,'correlativo'=>$value->correlativo,'idtipodocumento'=>$value->id_tipo_documento);?>              
                        <a href="{{route('redaccion',$redac)}}" class="btn btn-success"> Crear Documento</a>    
                    </div>
                    <br>
                </div>
                
                
            </div>
        </div>
    @endforeach()
</div>
@endsection