@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-keyboard mr-2"></i>Resenhas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('bibliotecas.index') }}">Biblioteca</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('resenhas.index') }}">Resenhas</a></li>
            <li class="breadcrumb-item active">Detalhes de Resenha</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-keyboard mr-1"></i>
                Resenha do Livro: {{ $resenha->titulo }}
            </div>
            <div class="card-body">
                {{ $resenha->resenha }}
            </div>

            <div class="card-footer">
                Criado em: {{ $resenha->created_at }}
            </div>
        </div>

        <div class="form-row">
            <div class="col-sm-10">
                <a class="btn btn-warning" href="{{ route('resenhas.edit', $resenha->id) }}" role="button">
                    <i class="fas fa-pen mr-1"></i>Editar</a>

                <a class="btn btn-primary" href="{{ route('resenhas.index') }}" role="button">
                    <i class="fas fa-arrow-left mr-1"></i>Voltar</a>
            </div>
        </div>

    </div>
    
@endsection
