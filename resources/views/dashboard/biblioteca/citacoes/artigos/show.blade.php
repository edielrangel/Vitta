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
            <li class="breadcrumb-item active"><a href="{{ route('citacaoArtigo.index')  }}">Citações de Artigos</a></li>
            <li class="breadcrumb-item active">Detalhes do Artigo</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-file-invoice mr-1"></i>
                Citações do Artigo: {{ $artigo->titulo }}
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <a class="btn btn-success btn-sm" href="{{ route('artigos.edit', $artigo->id) }}" role="button">
                    <i class="fas fa-eye mr-1"></i>Ver Artigo</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('citacoesArtigo.add', $artigo->id) }}" role="button">
                        <i class="fas fa-plus mr-1"></i>Adicionar Citação ao Artigo</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Citação</th>
                                <th>Tag</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($citacaoArtigo as $citacao)
                                <tr>
                                    <td>{{ $citacao->citacao }}</td>
                                    <td>{{ $citacao->tags }}</td>
                                    <td><a class="btn btn-info btn-sm" href="{{ route('citacoesArtigo.show', $citacao->id) }}" role="button">
                                        <i class="fas fa-info-circle mr-1"></i>Detalhar</a>
                                    </td>
                                </tr>                          
                            @endforeach
                        </tbody>
                    </table>
                    {{ $citacaoArtigo->links() }}
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