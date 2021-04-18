@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.inventario.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-image mr-2"></i>Gravuras</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('bibliotecas.index') }}">Inventário</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('gravuras.index') }}">Gravuras</a></li>
            <li class="breadcrumb-item active">Detalhes da Gravuras</li>
        </ol>
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <a href="{{ url('storage/img/inventario/gravuras/'.$gravura->imagem) }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ url('storage/img/inventario/gravuras/'.$gravura->imagem) }}" alt="{{ $gravura->titulo ?? '' }}" class="img-thumbnail"></a>
                </div>
            </div>
        
            <div class="col-sm-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-image mr-1"></i>
                        Gravura: <strong>{{ $gravura->titulo ?? '' }}</strong>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Tipo</label>
                                    <input type="text" class="form-control" value="{{ $gravura->tipo_gravura }}" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Cor</label>
                                    <input type="text" class="form-control" value="{{ $gravura->cor }}" readonly>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label>Acid</label>
                                    <input type="text" class="form-control"value="{{ $gravura->acid }}" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" value="{{ $gravura->estado }}" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" value="{{ $gravura->titulo ?? '' }}" readonly>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label>Artista</label>
                                    <input type="text" name="artista" class="form-control" value="{{ $gravura->artista }}" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Tiragem</label>
                                    <input type="text" name="tiragem" class="form-control" value="{{ $gravura->tiragem ?? 'N/A' }}" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Ano de Aquisição</label>
                                    <input type="text" name="ano_aquisicao" id="ano" class="form-control" value="{{ $gravura->ano_aquisicao }}" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Valor de Compra</label>
                                    <input type="text" name="valor" id="valor" class="form-control" value="{{ $gravura->valor ?? '0.00' }}" readonly>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Observação</label>
                                    <input type="text" name="observacao" class="form-control" value="{{ $gravura->observacao ?? '' }}" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-10">
                                    <a class="btn btn-warning" href="{{ route('gravuras.edit', $gravura->id) }}" role="button">
                                        <i class="fas fa-pen mr-1"></i>Editar</a>
                                    <a class="btn btn-primary" href="{{ route('gravuras.index') }}" role="button">
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
