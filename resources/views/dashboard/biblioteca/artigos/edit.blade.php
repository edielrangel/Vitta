@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-font mr-2"></i>Artigos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Biblioteca</a></li>
            <li class="breadcrumb-item active">Artigos</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus mr-1"></i>
                Editar dados do Livro: <strong>{{ $artigo->titulo }}</strong>
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
                    <form action="{{ route('artigos.update', $artigo->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Título</label>
                                <input type="text" class="form-control" max="200" min="5" name="titulo" value="{{ $artigo->titulo ?? old('titulo') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Subtítulo</label>
                                <input type="text" class="form-control" max="200" min="5" name="subtitulo" value="{{ $artigo->subtitulo ?? old('subtitulo') }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Revista</label>
                                <input type="text" class="form-control" name="revista" value="{{ $artigo->revista ?? old('revista') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Cidade</label>
                                <input type="text" class="form-control" min="3" name="cidade" value="{{ $artigo->cidade ?? old('cidade') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-1 mb-3">
                                <label>Volume</label>
                                <input type="text" class="form-control" name="volume" value="{{ $artigo->volume ?? old('volume') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-1 mb-3">
                                <label>Número</label>
                                <input type="text" class="form-control" name="numero" value="{{ $artigo->numero ?? old('numero') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-1 mb-3">
                                <label>Ano</label>
                                <input type="text" class="form-control" name="ano" id="ano" value="{{ $artigo->ano ?? old('ano') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Páginas</label>
                                <input type="text" class="form-control" min="1" name="paginas" value="{{ $artigo->paginas ?? old('paginas') }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label>DOI</label>
                                <input type="url" class="form-control" name="doi" value="{{ $artigo->doi ?? old('doi') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Palavras-Chave</label>
                                <input type="text" class="form-control" min="1" name="palavras_chave" value="{{ $artigo->palavras_chave ?? old('palavras_chave') }}" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Resumo</label>
                                <textarea class="form-control" name="resumo">{{ $artigo->resumo ?? old('resumo') }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Observação</label>
                                <textarea class="form-control" name="observacao">{{$artigo->observacao ?? old('observacao') }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt mr-1"></i>Atualizar</button>
                                <a class="btn btn-primary" href="{{ route('artigos.index') }}" role="button">
                                    <i class="fas fa-ban"></i> Cancelar</a>
                            </div>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-edit mr-1"></i>
                Adicionar Autor(a) ao Artigo: <strong>{{ $artigo->titulo }}</strong>
            </div>
            <div class="card-body">
                <div class="mb-2"><a class="btn btn-primary btn-sm" href="{{ route('autorArtigo.show', $artigo->id) }}" role="button">
                    <i class="fas fa-plus mr-1"></i>Adicionar Autor(a)</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Autor(a)</th>
                                <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($autores = autorToArtigo($artigo->id) as $autor)
                                <tr>
                                    <td>
                                        {{ $autor->citacao }}, 
                                    </td>
                                    <td>
                                        <form id="delete-editora-{{ $artigo->id }}" action="{{ route('autorArtigo.destroy', $autor->id) }}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt mr-1"></i>Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    
@endsection
