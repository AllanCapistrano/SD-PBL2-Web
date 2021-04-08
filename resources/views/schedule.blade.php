@extends('template.master')

@section('title', 'Horário')

@section('content-css')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
<link rel="stylesheet" href="{{ asset('css/switch.css') }}">
@livewireStyles
@endsection



@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <livewire:show-schedule />
        </div>
    </div>
@endsection



@section('content-js')
@livewireScripts
@endsection