@extends('template.master')

@section('title', 'Histórico')

@section('content-css')
<link rel="stylesheet" href="{{ asset('css/historic.css') }}">
@endsection



@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primeiro</th>
                    <th scope="col">Último</th>
                    <th scope="col">Nickname</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
              
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primeiro</th>
                    <th scope="col">Último</th>
                    <th scope="col">Nickname</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
            </table>
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