@extends('template.master')

@section('title', 'Home')

@section('content-css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-timer.css') }}">
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

    <div class="row mt-5">
        <div class="col-12 offset-0 col-sm-6 offset-sm-3 col-lg-4 offset-lg-2 d-flex justify-content-center align-items-center">
            <h3 class="text-white mx-2">Tempo: </h3>
            <input class="form-control input-timer" type="text" name="timer" id="timer" placeholder="Ex: 00h30m05s">
        </div>
        <div class="col-3 offset-1 col-sm-3 offset-sm-3 offset-md-4 col-lg-3 offset-lg-0 mt-3 mt-lg-0">
            <form action="" method="POST">
                <div class="align-buttons align-items-center">
                    <div class="form-check text-white mx-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="rb-ligada"checked>
                        <label class="form-check-label" for="rb-ligada">
                            Ligada
                        </label>
                    </div>
                    <div class="form-check text-white mx-1">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="rb-desligada">
                        <label class="form-check-label" for="rb-desligada">
                            Desligada
                        </label>
                    </div>

                    <button class="btn btn-md btn-secondary mx-3 align-self-center" type="submit">Ativar</button>
                </div>
            </form>
        </div>
    </div>
@endsection



@section('content-js')
    
@endsection