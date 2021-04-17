@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-user-edit mr-2"></i>Autores</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('bibliotecas.index') }}">Biblioteca</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('autores.index') }}">Autores(as)</a></li>
            <li class="breadcrumb-item active">Editar Autores</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus mr-1"></i>
                Editar dados do(a) Autor(a)
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
                    <form action="{{ route('autores.update', $autor->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Autor(a)</label>
                                <input type="text" class="form-control" max="200" min="5" name="autor" autocomplete="off" value="{{ $autor->autor ?? old('autor') }}" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Nome para Citação (ABNT)</label>
                                <input type="text" class="form-control" max="200" min="5" name="citacao" autocomplete="off" value="{{ $autor->citacao ?? old('citacao') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt mr-1"></i>Atualizar</button>
                                <a class="btn btn-primary" href="{{ route('autores.index') }}" role="button">
                                    <i class="fas fa-ban"></i> Cancelar</a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-book mr-1"></i>
                Livros deste(a) Autor
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Título</th>
                              <th scope="col">Categoria</th>
                              <th scope="col">Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($livros as $livro)
                                <tr>
                                    <th scope="row">{{ $livro->id }}</th>
                                    <td>{{ $livro->titulo }}</td>
                                    <td>{{ $livro->categoria }}</td>
                                    <td><a href="{{ route('livros.edit', $livro->id) }}"><i class="fas fa-eye"></i></a></td>
                              </tr>
                            @endforeach                            
                          </tbody>
                    </table>
                </div>                
            </div>
        </div>

        @if (!empty($artigos))
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-font mr-1"></i>
                    Artigos deste(a) Autor
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Ano</th>
                                <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artigos as $artigo)
                                    <tr>
                                        <th scope="row">{{ $artigo->id }}</th>
                                        <td>{{ $artigo->titulo }}</td>
                                        <td>{{ $artigo->ano }}</td>
                                        <td><a href="{{ route('artigos.edit', $artigo->id) }}"><i class="fas fa-eye"></i></a></td>
                                </tr>
                                @endforeach                            
                            </tbody>
                        </table>
                    </div>                
                </div>
            </div>
        @endif

    </div>
    
@endsection
