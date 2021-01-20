@extends('plantilla.admin')

@section('label1')

            <div class="col-sm-3 col-sm-6">
                <a href="{{route('resepcion')}}">
                <div class="information gray_info">   
                    <div class="information_inner">
                        <div class="info gray_symbols"><i class="fa fa-book icon"></i></div>
                        <span>Registrar Consulta</span>
                        <h1 class="bolded">R.C.</h1>
                        <div class="infoprogress_gray">
                        
                        <div class="grayprogress"></div>
                        </div>
                        
                        <b class=""><small>Registrar datos de la Consulta</small></b>
                        
                    </div>
                </div>
                </a>
            </div>

            @if($datos->pernicion!=6 and $datos->pernicion!=5)
            <div class="col-sm-3 col-sm-6">
                <a href="{{route('listaderivadosenespera')}}">
                <div class="information red_info">   
                    <div class="information_inner">
                        <div class="info red_symbols"><i class="fa fa-book icon"></i></div>
                        
                        <span>Lista de Derivados En Espera</span>
                        <h1 class="bolded">L.D.E</h1>
                        <div class="infoprogress_red">
                        
                        <div class="redprogress"></div>
                        </div>
                        
                        <b class=""><small>Lista de Derivados En Espera</small></b>
                    </div>
                </div>
                </a>
            </div>
            @endif

            @if($datos->idequipo==3 or $datos->idequipo==4 or $datos->idequipo==2)
            <div class="col-sm-3 col-sm-6">
                <a href="{{route('listaDerivadosAtendidos')}}">
                <div class="information green_info">   
                    <div class="information_inner">
                        <div class="info green_symbols"><i class="fa fa-book icon"></i></div>
                        
                        <span>C. Atendidos Por Derivacion</span>
                        <h1 class="bolded">C.A.D</h1>
                        <div class="infoprogress_green">
                        
                        <div class="greenprogress"></div>
                        </div>
                        
                        <b class=""><small>Lista de Casos Derivados Atendidos</small></b>
                    </div>
                </div>
                </a>
            </div>
            @endif        


    
    <script type="text/javascript">
        setTimeout( function() { window.location.reload(); }, 30000 );
    </script>
@endsection