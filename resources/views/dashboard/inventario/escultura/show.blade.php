@extends('layouts.dashboard.master')

@section('menu')
@include('dashboard.inventario.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-monument mr-2"></i>Esculturas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('inventario.index') }}">Inventário</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('esculturas.index') }}">Esculturas</a></li>
            <li class="breadcrumb-item active">Detalhes da Escultura</li>
        </ol>
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <a href="{{ url('storage/img/inventario/esculturas/'.$escultura->imagem) }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ url('storage/img/inventario/esculturas/'.$escultura->imagem) }}" alt="{{ $escultura->titulo ?? '' }}" class="img-thumbnail"></a>
                </div>
            </div>
        
            <div class="col-sm-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-monument mr-1"></i>
                        Escultura: <strong>{{ $escultura->titulo ?? '' }}</strong>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="col-md-8 mb-3">
                                    <label>Artista</label>
                                    <input type="text" name="artista" class="form-control" value="{{ $escultura->artista }}" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Material</label>
                                    <input type="text" name="artista" class="form-control" value="{{ $escultura->material }}" readonly>
                                </div>
                            </div>
        
                            <div class="form-row">
                                
                                <div class="col-md-3 mb-3">
                                    <label>Altura (cm)</label>
                                    <input type="text" name="altura" class="form-control" value="{{ $escultura->altura }}" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Largura (cm)</label>
                                    <input type="text" name="largura" class="form-control" value="{{ $escultura->largura }}" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Profundidade (cm)</label>
                                    <input type="text" name="profundidade" class="form-control" value="{{ $escultura->profundidade }}" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Peso (kg)</label>
                                    <input type="text" name="peso" id="peso" class="form-control" value="{{ $escultura->peso }}" readonly>
                                </div>
                            </div>
        
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Ano de Aquisição</label>
                                    <input type="text" name="ano_aquisicao" id="ano" class="form-control" value="{{ $escultura->ano_aquisicao }}" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Valor de Compra</label>
                                    <input type="text" name="valor" id="valor" class="form-control" value="{{ $escultura->valor }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" value="{{ $escultura->estado }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Observação</label>
                                    <input type="text" name="observacao" class="form-control" value="{{ $escultura->observacao }}" readonly>
                                </div>
                            </div>
        
                            <div class="form-row">
                                <div class="col-sm-10">
                                    <a class="btn btn-warning" href="{{ route('esculturas.edit', $escultura->id) }}" role="button">
                                        <i class="fas fa-pen mr-1"></i>Editar</a>
                                    <a class="btn btn-primary" href="{{ route('esculturas.index') }}" role="button">
                                        <i class="fas fa-arrow-left mr-1"></i>Voltar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
@endsection
