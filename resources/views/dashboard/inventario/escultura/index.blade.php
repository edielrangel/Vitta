@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.inventario.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-monument mr-2"></i>Esculturas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('inventario.index') }}">Inventário</a></li>
            <li class="breadcrumb-item active">Esculturas</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-monument mr-1"></i>
                Esculturas
            </div>
            <div class="card-body">
                <div class="mb-2"><a class="btn btn-primary btn-sm" href="{{ route('esculturas.create') }}" role="button">
                    <i class="fas fa-plus"></i> Adicionar Escultura</a>
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
                            @foreach ($esculturas as $escultura)
                                <tr>
                                    <th scope="row">{{ $escultura->id }}</th>
                                    <td>{{ $escultura->artista }}</td>
                                    <td>{{ $escultura->titulo }}</td>
                                    <td>{{ $escultura->ano_aquisicao }}</td>
                                    <td><a href="{{ route('esculturas.show', $escultura->id) }}"><i class="fas fa-eye mr-1"></i></a>
                                        <a href="{{ route('esculturas.edit', $escultura->id) }}"><i class="fas fa-pen mr-1"></i></a></td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                    {{ $esculturas->links() }}
                </div>
            </div>
        </div>
    </div>
    
@endsection