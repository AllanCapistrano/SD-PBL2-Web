@extends('template.master')

@section('title', 'Histórico')

@section('content-css')
<link rel="stylesheet" href="{{ asset('css/historic.css') }}">
@endsection

@section('content')
    <form action="{{ route('refresh') }}" method="post" id="refresh_form" onsubmit="return false">
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
                    <th scope="col" class="table-font-size-custom">Data</th>
                    <th scope="col" class="table-font-size-custom">Consumo Total</th>
                    <th scope="col" class="table-font-size-custom">Tarifa</th>
                    <th scope="col" class="table-font-size-custom">Preço Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($historics as $historic)
                    <tr>
                      <th scope="row" class="table-font-size-custom">{{ \Carbon\Carbon::parse($historic->date)->format('d/m/Y') }}</th>
                      <th class="table-font-size-custom">{{ $historic->energy_cons }} Wh</th>
                      @foreach ($tariffs as $tariff)
                        @php
                            $temp = explode('-', $tariff->date);
                            $temp2 = explode('-', $historic->date);
                        @endphp
                        @if ($temp[1] == $temp2[1])
                            <th class="table-font-size-custom">R$ {{ str_replace('.', ',', $tariff->value) }}</th>
                        @endif
                      @endforeach
                      <th class="table-font-size-custom">R$ {{ str_replace('.', ',', $historic->price) }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



@section('content-js')
    
@endsection