<div class="left_nav_slidebar">
  <ul>
    @if($datos->pernicion==0)
    <li><a href="javascript:void(0);"><i class="fa fa-home"></i> Super Admin <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span> </a>
      <ul>        
        <li> <a href="{{route('registro_equipo')}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b>Crear Equipo</b> </a> 
        </li>
        <li> <a href="{{route('registro_usuario')}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b>Crear Usuario</b> </a> 
        </li>
        <li> <a href="{{route('registro_video')}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b>Subir video</b> </a> 
        </li>
        
      </ul>
    </li>
    @endif

    @if($datos->pernicion==0)
    <li><a href="javascript:void(0);"><i class="fa fa-home"></i> Listas de Usuarios<span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span> </a>
      <ul>
        <li> <a href="{{route('usuarios')}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b> Todos </b> </a>        
        @foreach($equipos as $value)
          <li> <a href="{{route('listausuarios',$value->id)}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b> {{$value->equipo}} </b> </a>
        @endforeach()

        

        </li>
        <li> <a href="{{route('listarequipos')}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b> Equipos</b> </a> 
        </li>
        
      </ul>
    </li>
    @endif


    <li> <a href="{{route('a69169866ef77e7bb580947a8719892ac8d64efdeiris')}}"> <i class="fa fa-edit"></i> Escritorio</a></li>

    @if($datos->pernicion==1)
      <li> <a href="javascript:void(0);"> <i class="fa fa-tasks"></i> Admin<span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span></a>
        <ul>
          <li> <a href="{{route('listaequipo',$datos->idequipo)}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b> Equipo de trabajo </b> </a>
        </ul>
      </li>
    @endif

    <li> <a href="javascript:void(0);"> <i class="fa fa-tasks"></i> Menu<span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span></a>
      <ul>
        <li> <a href="{{route('usuariosactivos')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> Usuarios Activos</b> </a> </li>
        
        <li> <a href="{{route('resepcion')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> Crear Consulta</b> </a> </li>
        
        <li> <a href="{{route('listaAtencion')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> Lista de Atencion</b> </a> </li>

         @if($datos->pernicion!=5 and $datos->pernicion!=4 and $datos->pernicion!=6)
         <li> <a href="{{route('listaderivadosenespera')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> L.D.E.</b> </a> </li>
         <li> <a href="{{route('listaDerivadosAtendidos')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> C.A.D.</b> </a> </li>
         @endif

      </ul>
    </li>

    <li> <a href="javascript:void(0);"> <i class="fa fa-tasks"></i> Multimedia<span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span></a>
      <ul>
        <li> <a href="http://svfhce.umsa.bo/sv/atp/index.php/category/capsulas-informativas/" target="_blank"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> Capsula Inf.</b> </a> </li>

        <li> <a href="http://svfhce.umsa.bo/sv/atp/index.php/category/guia-psicologica/" target="_blank"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> Guia Psico.</b> </a> </li>

      </ul>
    </li>

    <li> <a href="{{route('listaLibro')}}"> <i class="fa fa-edit"></i> Libros</a></li>
    <li> <a href="{{route('listaVideo')}}"> <i class="fa fa-edit"></i> Videos</a></li>

  </ul>


</div>