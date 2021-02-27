@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <h1 class="mt-4"></h1>

    <div class="row">
        <div class="col-sm-3 mb-3">
            <div class="card">
                <img class="img-fluid rounded mx-auto d-block" src="{{ url('img/Hello.svg') }}">
                <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3">
            <div class="card">
                <img class="img-fluid rounded mx-auto d-block" src="{{ url('img/Hello.svg') }}">
                <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3">
            <div class="card">
                <img class="img-fluid rounded mx-auto d-block" src="{{ url('img/Hello.svg') }}">
                <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-3">
            <div class="card">
                <img class="img-fluid rounded mx-auto d-block" src="{{ url('img/Hello.svg') }}">
                <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>

    </div>
@endsection
