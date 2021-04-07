@extends('template.master')

@section('title', 'Home')

@section('content-css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection



@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <a class="mx-3 navbar-brand lamp-icon" href="#">
                @if (1==1)
                    <i class="bi bi-lightbulb-off-fill"></i>
                @else
                    <i class="bi bi-lightbulb-fill"></i>
                @endif
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            @if (1==1)
                <h2>LIGADA</h2>
            @else
                <h2>DESLIGADA</h2>
            @endif
        </div>
    </div>
@endsection



@section('content-js')
    
@endsection