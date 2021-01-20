<div class="brand">
      <!--\\\\\\\ brand Start \\\\\\-->
      <div class="logo" style="display:block">
        <span class="theme_color">CAI-COVID</span>
      </div>
      <div class="small_logo" style="display:none">
        <img src="images/s-logo.png" width="50" height="47" alt="s-logo" /> 
        <img src="images/r-logo.png" width="122" height="20" alt="r-logo" />
      </div>
</div>

<div class="header_top_bar">
      <!--\\\\\\\ header top bar start \\\\\\-->
      <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
      <div class="top_left">
        <div class="top_left_menu">
          <ul>
            <li> <a href="javascript:void(0);"><i class="fa fa-repeat"></i></a> </li>
          </ul>
        </div>
        
      </div>

      <div class="top_right_bar">
        
        <div class="top_right">
          <div class="top_right_menu">
            <ul>
              @if($cantidad->cantidad>0)
                <div class="alert alert-danger" role="alert">
                  Deribados en Espera = {{$cantidad->cantidad}} 
                </div>
              @endif
            </ul>
          </div>
        </div>

        <div class="top_right">
          <div class="top_right_menu">
            <ul>
                @if($aten->disponible=='1')
                <div class="row alert alert-success" role="alert">
                  Disponible
                </div>
                @else
                <div class="row alert alert-danger" role="alert">
                  No Disponible
                </div>
                @endif
            </ul>
          </div>
        </div>
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img src="{{asset('assets/images/avatarm.png')}}" /><span class="user_adminname">{{$datos->nombre}}</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href="{{route('profileusuarios',$datos->idPersona)}}"><i class="fa fa-user"></i> My Perfil</a> </li>
            <li> <a href="{{route('a69169iris866ef77e7bb580947a8719892ac8d64efdeiris')}}"><i class="fa fa-power-off"></i> Salir</a> </li>
          </ul>
        </div>
      </div>
    </div>