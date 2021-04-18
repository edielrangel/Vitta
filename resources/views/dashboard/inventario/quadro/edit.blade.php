@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-image mr-2"></i>Quadros</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('inventario.index') }}">Inventário</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('quadros.index') }}">Gravuras</a></li>
            <li class="breadcrumb-item active">Editar Dados do Quadro</li>
        </ol>
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <a href="{{ url('storage/img/inventario/quadros/'.$quadro->imagem) }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ url('storage/img/inventario/quadros/'.$quadro->imagem) }}" alt="{{ $quadro->titulo ?? '' }}" class="img-thumbnail"></a>
                </div>
            </div>
        
            <div class="col-sm-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-image mr-1"></i>
                        Quadro: <strong>{{ $quadro->titulo ?? '' }}</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('quadros.update', $quadro->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" placeholder="Se houver" value="{{ $quadro->titulo }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Artista</label>
                                    <input type="text" name="artista" class="form-control" value="{{ $quadro->artista }}">
                                </div>
                            </div>
        
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Técnica</label>
                                    <input type="text" name="tecnica" class="form-control" value="{{ $quadro->tecnica }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Ano de Aquisição</label>
                                    <input type="text" name="ano_aquisicao" id="ano" class="form-control" value="{{ $quadro->ano_aquisicao }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Valor de Compra</label>
                                    <input type="text" name="valor" id="valor" class="form-control" value="{{ $quadro->valor }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Medidas</label>
                                    <input type="text" name="medidas" class="form-control" value="{{ $quadro->medidas }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Observação</label>
                                    <input type="text" name="observacao" class="form-control" value="{{ $quadro->observacao ?? '' }}">
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
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Atualizar</button>
                                    <a class="btn btn-primary" href="{{ route('quadros.index') }}" role="button">
                                        <i class="fas fa-ban"></i> Cancelar</a>
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
        });
    </script>
@endsection