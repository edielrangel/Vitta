@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-file-invoice mr-2"></i>Citações de Livros</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('bibliotecas.index') }}">Biblioteca</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('citacoes.index') }}">Citações</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('citacaoLivro.show', $citacao->livro_id)  }}">Citações de Livros</a></li>
            <li class="breadcrumb-item active">Detalhes da Citação</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-file-invoice mr-1"></i>
                Citações do Livro: {{ $citacao->titulo }}
            </div>
            <div class="card-body">
                {{ $citacao->citacao }}
            </div>
            <div class="card-footer">
                Página: {{ $citacao->pagina }} | Parágrafo/Marcação: {{ $citacao->paragrafo }}
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user mr-1"></i>
                Comentário sobre o trecho
            </div>
            <div class="card-body">
                {{ $citacao->comentario }}
            </div>
            <div class="card-footer">
                Criado em: {{ $citacao->created_at }}
            </div>
        </div>

            <form id="delete-editora-{{ $citacao->id }}" action="{{ route('citacaoLivro.destroy', $citacao->id) }}" method="post">
                {{csrf_field()}}
                {{method_field('delete')}}
                <a class="btn btn-success" href="{{ route('citacaoLivro.edit', $citacao->id) }}" role="button">
                    <i class="fas fa-pen mr-1"></i>Editar</a>
        
                <a class="btn btn-warning" href="{{ route('citacaoLivro.show', $citacao->livro_id) }}" role="button">
                    <i class="fas fa-arrow-left mr-1"></i>Voltar</a>
                    
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Excluir</button>
            </form>
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