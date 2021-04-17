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
            <li class="breadcrumb-item active">Autores</li>
        </ol>
        {{-- <div class="card mb-4">
            <div class="card-body">
                <h5>Pressão Arterial Sistólica (PAS) e Pressão Arterial Diastólica (PAD)</h5>
                Pressão arterial sistólica (PAS) é o maior valor verificado durante a aferição de pressão arterial. Exemplo: 120x80 significa: 120 refere-se à pressão arterial sistólica e 80 refere-se à pressão arterial diastólica, ambas medidas em milímetros de mercúrio (mmHg).
            </div>
        </div> --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-edit mr-1"></i>
                Autores
            </div>
            <div class="card-body">
                <div class="mb-2"><a class="btn btn-primary btn-sm" href="{{ route('autores.create') }}" role="button">
                    <i class="fas fa-plus"></i> Adicionar Autor(a)</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>COD</th>
                                <th>Autor(a)</th>
                                <th>Livros</th>
                                <th>Artigos</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($autores as $autor)
                                <tr>
                                    <td>{{ $autor->id }}</td>
                                    <td>{{ $autor->autor }}</td>
                                    <td>{{ livrosAutor($autor->id) }}</td>
                                    <td>{{ artigosAutor($autor->id) }}</td>
                                    <td>
                                        <form id="delete-editora-{{ $autor->id }}" action="{{ route('autores.destroy', $autor->id) }}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <a class="btn btn-warning btn-sm" href="{{ route('autores.edit', $autor->id) }}" role="button">
                                                <i class="fas fa-info-circle mr-1"></i>Detalhar</a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt mr-1"></i>Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $autores->links() }}
                </div>
            </div>
        </div>
    </div>
    
@endsection