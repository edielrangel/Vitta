@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')

<div class="container-fluid">
    <h1 class="mt-4">Entidade</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Entidade</li>
    </ol>
    <div class="row">
        <div class="col-3">
            <img src="https://via.placeholder.com/200" class="rounded" alt="...">
        </div>
    

        <div class="col-9">
            This page is an example of using the light side navigation option. By appending the
            <code>.sb-sidenav-light</code>
            class to the
            <code>.sb-sidenav</code>
            class, the side navigation will take on a light color scheme. The
            <code>.sb-sidenav-dark</code>
            is also available for a darker option.
        </div>
    </div>
</div>

@endsection