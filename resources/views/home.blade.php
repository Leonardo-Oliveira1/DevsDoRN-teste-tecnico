@extends('layouts.core')

@section('content')
    <h1>Página principal</h1>
    <a href="{{ route('associates') }}">Associados</a> <br>
    <a href="{{ route('annuities') }}">Anuidades </a>
@endsection
