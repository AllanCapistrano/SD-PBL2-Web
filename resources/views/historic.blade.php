@extends('template.master')

@section('title', 'Histórico')

@section('content-css')
<link rel="stylesheet" href="{{ asset('css/historic.css') }}">
@endsection



@section('content')
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h3 style="color: #fff">Tarifa Mensal: R$ 0,38</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2 d-flex justify-content-center align-items-center">
            <table class="table table-borderless mt-5">
                <thead>
                  <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Consumo Total</th>
                    <th scope="col">Preço Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">12/04/2021</th>
                    <th>1000 Wh</th>
                    <th>R$ 380,00</th>
                  </tr>
                  <tr>
                    <th scope="row">13/04/2021</th>
                    <th>920 Wh</th>
                    <th>R$ 349,60</th>
                  </tr>
                  <tr>
                    <th scope="row">14/04/2021</th>
                    <th>896 Wh</th>
                    <th>R$ 340,40</th>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection



@section('content-js')
    
@endsection