@extends('plantilla.admin')

@section('label1')
    
    @foreach($libro as $value)
    <div class="col-sm-2 col-sm-3">
        <a href="{{$value->pdf}}" target="_blank">
        <div class="information red_info">   
            <div class="information_inner">
                <div class="info red_symbols"><i class="fa fa-book icon"></i></div>
                <span>{{$value->titulo}}</span>
            </div>
        </div>
        </a>
    </div>
    @endforeach

@endsection