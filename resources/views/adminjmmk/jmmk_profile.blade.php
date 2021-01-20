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
                  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> Usuario</a></li>
                  @if($datos->pernicion==0)
                  <li class=""><a href="#edit-profile" data-toggle="tab"><i class="fa fa-pencil"></i> Editar Datos</a></li>
                  <li class=""><a href="#mymessage" data-toggle="tab"><i class="fa fa-envelope"></i> Correlativos</a></li>
                  @endif
                  <li class=""><a href="#user-activities" data-toggle="tab"><i class="fa fa-laptop"></i> Editar Password</a></li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane animated fadeInRight active" id="about">
                    <div class="user-profile-content">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5>Datos Usuario</h5>
                          
                          <address>
                          <strong>Estado</strong><br>
                            {{$usuario->estado}}
                          </address>

                          <address>
                          <strong>Disponible</strong><br>
                            {{$usuario->disponible}}
                          </address>

                          <address>
                          <strong>Numero Asignado</strong><br>
                            <a href="https://api.whatsapp.com/send?phone={{$usuario->numero}}" class="btn btn-success" target="_blank">{{$usuario->numero}}</a>
                          </address>
                          
                        </div>
                        
                        <div class="col-sm-6">
                          
                          <address>
                          <strong>ID Usiario</strong><br>
                            {{$usuario->id}}
                          </address>

                          <address>
                          <strong>Equipo</strong><br>
                            {{$equipo->equipo}}
                          </address>
                          
                          <address>
                          <strong>Pernicion</strong><br>
                            {{$usuario->pernicion}}
                          </address>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane animated fadeInRight" id="edit-profile">
                    <div class="user-profile-content">

                      <form action="{{route('UpdateProfile',$persona->id)}}" class="form-horizontal row-border" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Cedula de Identidad</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="ci" value="{{$persona->ci}}" required="true">
                            <input type="hidden" name="id_usuario" value="{{$usuario->id}}">
                          </div>
                        </div><!--/form-group-->

                        <div class="form-group">
                          <label class="col-sm-4 control-label">Nombres</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nombre" value="{{$persona->nombre}}" required="true">
                          </div>
                        </div><!--/form-group--> 
                        
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Ap. Paterno </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="ap_paterno" value="{{$persona->ap_paterno}}">
                          </div>
                        </div><!--/form-group--> 
                        
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Ap. Materno</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="ap_materno" value="{{$persona->ap_materno}}">
                          </div>
                        </div><!--/form-group--> 
                        
                        <div class="form-group">
                          <label class="col-sm-4 control-label">E-mail</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="correo" value="{{$persona->correo}}" required="true">
                          </div>
                        </div><!--/form-group--> 
                        
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Celular</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="celular" value="{{$persona->celular}}" required="true">
                          </div>
                        </div><!--/form-group--> 
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Equipo de Trabajo</label>
                          <div class="col-sm-8">
                            <select name="equipo">
                              <option value="{{$equipo->id}}">{{$equipo->equipo}}</option>
                              @foreach($equipos as $value)
                                <option value="{{$value->id}}">{{$value->equipo}}</option>
                              @endforeach
                            </select>
                            
                          </div>
                        </div><!--/form-group-->

                        <div class="form-group">
                          <label class="col-sm-4 control-label">Numero Asignado</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="numero" value="{{$usuario->numero}}" required="true">
                          </div>
                        </div><!--/form-group--> 
                        
                        <div class="bottom">
                          <button type="submit" class="btn btn-warning">Actualizar Datos</button>                
                        </div><!--/form-group-->
                      </form>
                    </div>
                  </div>

                  <div class="tab-pane" id="user-activities">

                    <div class="user-profile-content">

                      <form action="{{route('UpdatePasswordA',$usuario->id)}}" class="form-horizontal row-border" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Password</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="pass" placeholder="Password" required="true">
                          </div>
                        </div><!--/form-group--> 

                        
                        <div class="bottom">
                          <button type="submit" class="btn btn-warning">Actualizar Password</button>
                        </div><!--/form-group-->
                      </form>
                    </div>
                    
                  </div>


                  <div class="tab-pane" id="mymessage">
                    <ul class="media-list">
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>

                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Tim Southee</a> <small>Yesterday at 04:00 AM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Kane Williamson</a> <small>January 17, 2014 05:35 PM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      
                      
                    </ul>
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