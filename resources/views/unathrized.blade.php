
@extends('layout')


@section('content')

@if(session('error'))
    <p class="alert alert-danger" style="position: relative; top: 100px;z-index: 999 " >{{ session('error') }}</p>
@endif
@endsection
