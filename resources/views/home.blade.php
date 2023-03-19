@extends('layouts.core')

@section('content')

<style>
    html,
    body {
        height: 100%
    }

    body{
        background-color: #f6f7f9;
    }
    a {
        position: relative;
        color: #23272f;
        text-decoration: none;
    }

    a:before {
        content: "";
        position: absolute;
        width: 100%;
        height: 3px;
        bottom: 0;
        left: 0;
        background-color: #93A4C7;
        visibility: hidden;
        -webkit-transform: scaleX(0);
        transform: scaleX(0);
        -webkit-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }

    a:hover:before {
        visibility: visible;
        -webkit-transform: scaleX(1);
        transform: scaleX(1);
    }
</style>

<div class="h-100 d-flex align-items-center justify-content-center flex-column">
    <div class="d-flex gap-5 justify-content-between">
        <a href="{{ route('associates') }}" class="fs-2 text-decoration-none">Associados</a>
        <a href="{{ route('annuities') }}" class="fs-2">Anuidades </a>
    </div>
</div>
@endsection
