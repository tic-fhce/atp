@extends('plantilla.admin')

@section('label1')
  <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="page-content">
          <div class="row">

            <div class="col-md-4">
              <div class="profile_bg">
                @if(session('mensaje'))
                  <div class="row alert alert-success" role="alert">
                    {{session('mensaje')}}
                  </div>                      
                @endif

                <iframe width="300px" height="450px" src="{{Storage::url($pdf->pdf)}}" frameborder="0"></iframe>
              </div>
            </div>
            <!--/col-md-4-->
            <div class="col-md-8">
              <div class="block-web full">
                
                <ul class="nav nav-tabs nav-justified nav_bg">
                  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> Datos del Documento</a></li>
                  <li class=""><a href="#edit-profile" data-toggle="tab"><i class="fa fa-pencil"></i> Editar Datos</a></li>
                  <li class=""><a href="#user-activities" data-toggle="tab"><i class="fa fa-laptop"></i> Editar Password</a></li>
                  <li class=""><a href="#mymessage" data-toggle="tab"><i class="fa fa-envelope"></i> Correlativos</a></li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane animated fadeInRight active" id="about">
                    <div class="user-profile-content">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5>Datos Recepcion</h5>
                          
                          <address>
                          <strong>Nº Hoja de Ruta</strong><br>
                          {{$pdf->nhojaruta}}
                          </address>

                          <address>
                          <strong>Referencia</strong><br>
                          {{$pdf->referencia}}
                          </address>

                          <address>
                          <strong>Nº Hojas</strong><br>
                          {{$pdf->numerohojas}}
                          </address>

                          <address>
                          <strong>Registrado por</strong><br>
                          {{$pdf->nombre}}
                          </address>

                          <strong>Fecha de Registro</strong><br>
                          {{$pdf->created_at}}
                          </address>
                          
                        </div>
                        
                        <div class="col-sm-6">
                         

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane animated fadeInRight" id="edit-profile">
                    <div class="user-profile-content">

                    </div>
                  </div>

                  <div class="tab-pane" id="user-activities">

                    <div class="user-profile-content">

                    </div>
                    
                  </div>


                  <div class="tab-pane" id="mymessage">
                   
                  </div>
                </div>
                <!--/tab-content-->
              </div>
              <!--/block-web-->
            </div>
            <!--/col-md-8-->
          </div>
          <!--/row-->
        </div>
      </div>
@endsection