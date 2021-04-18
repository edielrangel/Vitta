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
            <li class="breadcrumb-item active">Nova Escultura</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-monument mr-1"></i>
                Esculturas
            </div>
            <div class="card-body">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Erros Encontrados</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>

                <form action="{{ route('esculturas.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Título</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Se houver">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Artista</label>
                            <input type="text" name="artista" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Material</label>
                            <select name="material" class="form-control">
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
                            <input type="number" name="altura" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Largura (cm)</label>
                            <input type="number" name="largura" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Profundidade (cm)</label>
                            <input type="number" name="profundidade" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Peso (kg)</label>
                            <input type="text" name="peso" id="peso" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-2 mb-3">
                            <label>Ano de Aquisição</label>
                            <input type="text" name="ano_aquisicao" id="ano" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Valor de Compra</label>
                            <input type="text" name="valor" id="valor" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Estado</label>
                            <input type="text" name="estado" class="form-control" placeholder="Ex.: Novo">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Imagem</label>
                            <input type="file" name="imagem" class="form-control-file">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Observação</label>
                            <input type="text" name="observacao" class="form-control" placeholder="Se houver">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Salvar</button>
                            <a class="btn btn-primary" href="{{ route('resenhas.index') }}" role="button">
                                <i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </div>

                </form>
                
                
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