@extends('plantilla.admin')

@section('label1')
    
    @foreach($libro as $value)
    <div class="col-sm-3 col-sm-6">
        <a href="{{asset('pdf/'.$value->pdf)}}" target="_blank">
        <div class="information gray_info">   
            <div class="information_inner">
                <div class="info gray_symbols"><i class="fa fa-book icon"></i></div>
                <span>{{$value->titulo}}</span>
            </div>
        </div>
        </a>
    </div>
    @endforeach

@endsection