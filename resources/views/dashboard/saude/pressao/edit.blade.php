@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-heartbeat mr-2"></i>Pressão Arterial</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Saúde</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('pressao.index') }}">Pressão</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Editar Dados de Aferição de Pressão
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
                <div class="col-12">
                    <form action="{{ route('pressao.update', $pressao->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label>Data</label>
                                <input type="date" class="form-control" name="dataAfericao" value="{{ $pressao->dataAfericao ?? old('dataAfericao') }}" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>PAS</label>
                                <input type="number" class="form-control" min="0" name="pas" value="{{ $pressao->pas ?? old('pas') }}" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>PAD</label>
                                <input type="number" class="form-control" min="0" name="pad" value="{{ $pressao->pad ?? old('pad') }}" required>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label>Local</label>
                                <input type="text" class="form-control" name="localAfericao" value="{{ $pressao->localAfericao ?? old('localAfericao') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Observação</label>
                                <input type="text" class="form-control" max="200" min="10" name="observacao" value="{{ $pressao->observacao ?? old('observacao') }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt mr-1"></i>Atualizar</button>
                                
                                <a class="btn btn-primary" href="{{ route('pressao.index') }}" role="button">
                                    <i class="fas fa-ban mr-1"></i>Cancelar</a>
                            </div>
                        </div>

                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
    
@endsection
