@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.inventario.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-paint-brush mr-2"></i>Quadros</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('inventario.index') }}">Inventário</a></li>
            <li class="breadcrumb-item active">Quadros</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-paint-brush mr-1"></i>
                Quadros
            </div>
            <div class="card-body">
                <div class="mb-2"><a class="btn btn-primary btn-sm" href="{{ route('quadros.create') }}" role="button">
                    <i class="fas fa-plus"></i> Adicionar Quadro</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Artista</th>
                            <th scope="col">Título</th>
                            <th scope="col">Ano Aquisição</th>
                            <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quadros as $quadro)
                                <tr>
                                    <th scope="row">{{ $quadro->id }}</th>
                                    <td>{{ $quadro->artista }}</td>
                                    <td>{{ $quadro->titulo }}</td>
                                    <td>{{ $quadro->ano_aquisicao }}</td>
                                    <td><a href="{{ route('quadros.show', $quadro->id) }}"><i class="fas fa-eye mr-1"></i></a>
                                        <a href="{{ route('quadros.edit', $quadro->id) }}"><i class="fas fa-pen mr-1"></i></a></td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                    {{ $quadros->links() }}
                </div>
            </div>
        </div>
    </div>
    
@endsection