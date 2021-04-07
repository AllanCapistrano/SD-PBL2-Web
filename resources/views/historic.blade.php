@extends('template.master')

@section('title', 'Histórico')

@section('content-css')
<link rel="stylesheet" href="{{ asset('css/historic.css') }}">
@endsection



@section('content')
    <div class="row">
        <div class="col-9 d-flex justify-content-center align-items-center">
            <table class="table table-borderless mt-5">
                <thead>
                  <tr>
                    <th scope="col">Mês</th>
                    <th scope="col">Consumo Total</th>
                    <th scope="col">Tarifa</th>
                    <th scope="col">Preço Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Jan</th>
                    <th>1000 Wh</th>
                    <th>R$ 0,32</th>
                    <th>R$ 320,00</th>
                  </tr>
                  <tr>
                    <th scope="row">Fev</th>
                    <th>920 Wh</th>
                    <th>R$ 0,38</th>
                    <th>R$ 349,60</th>
                  </tr>
                  <tr>
                    <th scope="row">Mar</th>
                    <th>896 Wh</th>
                    <th>R$ 0,43</th>
                    <th>R$ 385,25</th>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection



@section('content-js')
    
@endsection