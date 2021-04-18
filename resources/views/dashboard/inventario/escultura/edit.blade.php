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
            <li class="breadcrumb-item active">Editar Dados da Escultura</li>
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
                        <form action="{{ route('esculturas.update', $escultura->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" value="{{ $escultura->titulo ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Artista</label>
                                    <input type="text" name="artista" class="form-control" value="{{ $escultura->artista ?? '' }}">
                                </div>
                            </div>
        
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Material</label>
                                    <select name="material" class="form-control">
                                        <option value="{{ $escultura->material }}" selected>{{ $escultura->material }}</option>
                                        <option value="Cerâmica">Cerâmica</option>
                                        <option value="Madeira">Madeira</option>
                                        <option value="Metal">Metal</option>
                                        <option value="Vidro">Vidro</option>
                                        <option value="Concreto">Concreto</option>
                                        <option value="Plástico/Acríloco">Plástico/Acríloco</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label>Altura (cm)</label>
                                    <input type="number" name="altura" class="form-control" value="{{ $escultura->altura ?? '' }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Largura (cm)</label>
                                    <input type="number" name="largura" class="form-control" value="{{ $escultura->largura ?? '' }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Profundidade (cm)</label>
                                    <input type="number" name="profundidade" class="form-control" value="{{ $escultura->profundidade ?? '' }}">
                                </div>
                            </div>
        
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label>Peso (kg)</label>
                                    <input type="text" name="peso" id="peso" class="form-control" value="{{ $escultura->peso ?? '' }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Ano de Aquisição</label>
                                    <input type="text" name="ano_aquisicao" id="ano" class="form-control" value="{{ $escultura->ano_aquisicao ?? '' }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Valor de Compra</label>
                                    <input type="text" name="valor" id="valor" class="form-control" value="{{ $escultura->valor ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" value="{{ $escultura->estado ?? '' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Observação</label>
                                    <input type="text" name="observacao" class="form-control" value="{{ $escultura->observacao ?? '' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Nova Imagem</label>
                                    <input type="file" name="imagem" class="form-control-file">
                                </div>
                            </div>
        
                            <div class="form-row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync mr-1"></i>Atualizar</button>
                                    <a class="btn btn-primary" href="{{ route('esculturas.index') }}" role="button">
                                        <i class="fas fa-ban mr-1"></i>Cancelar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#valor').mask('000.000.000.000.000.00', {reverse: true});
            $('#ano').mask('0000');
            $('#peso').mask("#.##0.000", {reverse: true});
        });
    </script>
@endsection