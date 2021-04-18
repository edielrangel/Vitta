@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-paint-brush mr-2"></i>Quadros</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('inventario.index') }}">Inventário</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('quadros.index') }}">Quadros</a></li>
            <li class="breadcrumb-item active">Novo Quadro</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-paint-brush mr-1"></i>
                Gravuras
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

                <form action="{{ route('quadros.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Título</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Se houver" value="{{ old('titulo') ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Artista</label>
                            <input type="text" name="artista" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-2 mb-3">
                            <label>Técnica</label>
                            <input type="text" name="tecnica" class="form-control" placeholder="Se houver">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Ano de Aquisição</label>
                            <input type="text" name="ano_aquisicao" id="ano" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Valor de Compra</label>
                            <input type="text" name="valor" id="valor" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Medidas</label>
                            <input type="text" name="medidas" class="form-control" placeholder="Ex.: 20x30">
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
                            <button type="submit" class="btn btn-success"><i class="fas fa-check mr-1"></i>Salvar</button>
                            <a class="btn btn-primary" href="{{ route('quadros.index') }}" role="button">
                                <i class="fas fa-ban mr-1"></i>Cancelar</a>
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
        });
    </script>
@endsection