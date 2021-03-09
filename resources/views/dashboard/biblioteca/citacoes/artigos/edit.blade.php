@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-file-invoice mr-2"></i>Citações de Artigos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('bibliotecas.index') }}">Biblioteca</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('citacoes.index') }}">Citações</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('citacaoArtigo.show', $citacao->artigo_id)  }}">Citações de Artigos</a></li>
            <li class="breadcrumb-item active">Editar Citação</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-file-invoice mr-1"></i>
                Citações de Artigos
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
                    <form action="{{ route('citacaoArtigo.update', $citacao->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Artigo Título</label>
                                <input type="text" class="form-control" value="{{ $artigo->titulo }}" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Capítulo</label>
                                <input type="text" class="form-control" max="200" min="5" name="capitulo" value="{{ $citacao->titulo ?? old('capitulo') }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Citação</label>
                                <textarea class="form-control" name="citacao" required>{{ $citacao->citacao ?? old('citacao') }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2 mb-3">
                                <label>Página</label>
                                <input type="number" class="form-control" name="pagina" value="{{ $citacao->pagina ?? old('pagina') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Parágrafo/Marcação</label>
                                <input type="text" class="form-control" min="3" name="paragrafo" value="{{ $citacao->paragrafo ?? old('paragrafo') }}" autocomplete="off">
                            </div>
                            <div class="col-md-8 mb-3">
                                <label>Tags</label>
                                <input type="text" class="form-control" name="tags" data-role="tagsinput" value="{{ $citacao->tags ?? old('tags') }}" autocomplete="off" required>
                                <small class="form-text text-muted">Separar Tag por virgula (,).</small>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Comentário</label>
                                <textarea class="form-control" name="comentario">{{ $citacao->comentario ?? old('comentario') }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt mr-1"></i>Atualizar</button>
                                <a class="btn btn-primary" href="{{ route('citacaoArtigo.show', $artigo->id) }}" role="button">
                                    <i class="fas fa-ban mr-1"></i>Cancelar</a>
                            </div>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
    
@endsection

@section('styles')
    <link href="{{ url('css/tagsinput.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{ url('js/tagsinput.js') }}">
        $('input').tagsinput({
            maxTags: 3
        });
    </script>

@endsection