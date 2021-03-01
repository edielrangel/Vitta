@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')

<div class="container-fluid">
    <h1 class="mt-4">Entidade</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Entidade</li>
    </ol>
    <div class="row">
        <div class="col-3">
            <img src="https://via.placeholder.com/200" class="rounded" alt="...">
        </div>
    

        <div class="col-9">
            <form action="{{ route('entidade.update', '1') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationDefault01">Entidade</label>
                    <input type="text" class="form-control" name="nome" value="{{ $entidade->nome ?? old('nome') }}" required>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationDefault02">Data de Nascimento</label>
                    <input type="date" class="form-control" name="nascimento" value="{{ $entidade->nascimento ?? old('nascimento') }}" required>
                  </div>
                  <div class="col-md-5 mb-3">
                    <label for="validationDefaultUsername">E-Mail</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                      </div>
                      <input type="text" class="form-control" name="email" value="{{ $entidade->email ?? old('email') }}" aria-describedby="inputGroupPrepend2" required>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault03">Site</label>
                    <input type="url" class="form-control" name="site" value="{{ $entidade->site ?? old('site') }}">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault04">Lattes</label>
                    <input type="url" class="form-control" name="lattes" value="{{ $entidade->lattes ?? old('lattes') }}">
                  </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="">Redes Sociais</label>
                        <textarea class="form-control" name="redes_sociais" cols="30" rows="7">{{ $entidade->redes_sociais ??old('redes_sociais') }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="">Bio</label>
                        <textarea class="form-control" name="bio" cols="30" rows="7">{{ $entidade->bio ??old('bio') }}</textarea>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Atualizar</button>
              </form>
        </div>
    </div>
</div>

@endsection