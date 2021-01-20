@extends('plantilla.admin')

@section('label1')
  <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="page-content">
          <div class="row">

            <div class="col-md-4">
              <div class="profile_bg">
                
                <div class="user-profile-sidebar">
                  <div class="row">
                    
                    <div class="col-md-4">
                      <img src="{{asset('assets/images/avatar.png')}}" width="100px" height="100px" />
                    </div>
                    <div class="col-md-8">
                      <div class="user-identity">
                        <h4><strong>{{$persona->nombre}}</strong></h4>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="form-horizontal">
                  @if(session('mensaje'))
                    <div class="row alert alert-success" role="alert">
                      {{session('mensaje')}}
                    </div>                      
                  @endif
                  

                  <div class="row">
                    <label class="col-sm-5 control-label">C.I. :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->ci}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Nombre :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->nombre}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Ap. Paterno :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->ap_paterno}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Ap. Materno :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->ap_materno}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">E-mail :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->correo}}</label>
                  </div>

                  <div class="row">
                    <label class="col-sm-5 control-label">Celular :</label>
                    <label class="col-sm-7 control-label-l">{{$persona->celular}}</label>
                  </div>

                </div>

              </div>
            </div>
            <!--/col-md-4-->
            <div class="col-md-8">
              <div class="block-web full">
                
                <ul class="nav nav-tabs nav-justified nav_bg">
                  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> Atenciones</a></li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane animated fadeInRight active" id="about">
                    <div class="user-profile-content">
                      <div class="row">
                        <div class="col-sm-12">
                          
                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Obs</th>
                                  <th>Estado</th>
                                  <th>Fecha</th>
                                  <th>Derivado Por</th>
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($registro as $value)
                                <tr>
                                  <td>{{$value->idpersona}}</td>
                                    <td>{{$value->nombre}}</td>
                                    <td>{{$value->obs}}</td>
                                    <td>{{$value->tipo}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$value->atendio}}<br>{{$value->equipo}}</td>
                                    <td><a href="{{route('profileconsultorioAdmin',$value->idpersona)}}" class="btn btn-success">Seguimiento</a></td>
                                </tr>
                            @endforeach() 
                  
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane animated fadeInRight" id="edit-profile">
                    <div class="user-profile-content">

                      
                    </div>
                  </div>

                  <div class="tab-pane" id="user-activities">

                    
                    
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