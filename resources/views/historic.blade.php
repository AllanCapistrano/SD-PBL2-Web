@extends('template.master')

@section('title', 'Histórico')

@section('content-css')
<link rel="stylesheet" href="{{ asset('css/historic.css') }}">
@endsection

@section('content')
    <form action="" method="post" id="refresh_form" onsubmit="return false">
        @csrf
        <div class="row mt-3">
            <div class="col-12">
                <a class="mx-3 navbar-brand refresh-icon" onclick="document.getElementById('refresh_form').submit();">
                    <i class="fas fa-sync-alt"></i> Atualizar
                </a>
            </div>
        </div>
    </form>

    @if ($errors->has('value') || $errors->has('date'))
        <div class="row d-flex justify-content-center mt-5">
            <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
                <strong>Erro! É necessário preencher este(s) campo(s)</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <form action="{{ route('tariff.store') }}" method="post">
        @csrf
        <div class="row mt-custom">
            <div class="col-12 col-md-3 col-xl-2 offset-xl-1 d-flex justify-content-center">
                <h3 style="color: #fff">Tarifa Mensal:</h3>
            </div>
            <div class="col-12 mt-4 col-md-3 mt-md-0 d-flex justify-content-center">
                <input 
                    class="form-control custom-width {{ $errors->has('value') ? 'is-invalid' : '' }}" 
                    type="number" 
                    name="value" 
                    step="0.01" 
                    min="0.1" 
                    placeholder="Tarifa Mensal"
                >
            </div>
            <div class="col-12 mt-4 col-md-3 mt-md-0 d-flex justify-content-center">
                <input 
                    class="form-control custom-width {{ $errors->has('date') ? 'is-invalid' : '' }}" 
                    type="month" 
                    name="date"
                >
            </div>
            <div class="col-12 mt-4 col-md-2 mt-md-0 d-flex justify-content-center">
                <button class="btn btn-secondary w-100 custom-width" type="submit">Salvar</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-8 offset-2 d-flex justify-content-center align-items-center">
            <table class="table table-borderless mt-5">
                <thead>
                  <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Consumo Total</th>
                    <th scope="col">Tarifa</th>
                    <th scope="col">Preço Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">14/04/2021</th>
                    <th>1000 Wh</th>
                    <th>R$ 0,38</th>
                    <th>R$ 380,00</th>
                  </tr>
                  <tr>
                    <th scope="row">13/04/2021</th>
                    <th>920 Wh</th>
                    <th>R$ 0,38</th>
                    <th>R$ 349,60</th>
                  </tr>
                  <tr>
                    <th scope="row">12/04/2021</th>
                    <th>896 Wh</th>
                    <th>R$ 0,38</th>
                    <th>R$ 340,40</th>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection



@section('content-js')
    
@endsection