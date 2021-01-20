@extends('plantilla.main')

@section('label2')
<div class="row">
    @if(session('mensaje_error'))
        <div class="alert alert-danger" role="alert">
            {{session('mensaje_error')}}
        </div>
    @endif
    @if(session('mensaje_suses'))
        <div class="alert alert-danger" role="alert">
            {{session('mensaje_suses')}}
        </div>
    @endif
    <form role="form" class="form-horizontal" method="post" action="{{route('login')}}">
        @csrf
        
        <div class="modal-header text-center">
            <h3 class="modal-title" id="myModalLabel">Iniciar Sesión</h3>
        </div>
        
        <div class="modal-body">
            <div class="form-group">
                <div class="col-sm-10">
                  <input type="text" name="user" placeholder="Usuario" class="form-control" required="true">
                </div>
            </div>

            <div class="form-group">
                
                <div class="col-sm-10">
                    <input type="password" name="pass" class="form-control" placeholder="Password" required="true">
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <input type="submit" value="Ingresar"  class="btn btn-primary" />
        </div>
    </form>
</div>
@endsection
