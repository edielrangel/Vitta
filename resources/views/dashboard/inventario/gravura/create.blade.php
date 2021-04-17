@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-image mr-2"></i>Gravuras</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('bibliotecas.index') }}">Inventário</a></li>
            <li class="breadcrumb-item active">Gravuras</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-image mr-1"></i>
                Gravuras
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

                <form action="{{ route('gravuras.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label>Tipo</label>
                            <select name="tipo_gravura" class="form-control">
                                <option value="Fine Art">Fine Art</option>
                                <option value="Gravura em metal">Gravura em metal</option>
                                <option value="Linoleogravura">Linoleogravura</option>
                                <option value="Litogravura">Litogravura</option>
                                <option value="Monotipia">Monotipia</option>
                                <option value="Serigrafia">Serigrafia</option>
                                <option value="Xilogravura">Xilogravura</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Cor</label>
                            <select name="cor" class="form-control">
                                <option value="Nomocromático">Nomocromático</option>
                                <option value="Policromático">Policromático</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Acid</label>
                            <select name="acid" class="form-control">
                                <option selected></option>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Estado</label>
                            <input type="text" name="estado" class="form-control" placeholder="Ex.: Novo, com manchas, etc">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Título</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Se houver">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Artista</label>
                            <input type="text" name="artista" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-2 mb-3">
                            <label>Tiragem</label>
                            <input type="text" name="tiragem" class="form-control" placeholder="Se houver">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Ano de Aquisição</label>
                            <input type="text" name="ano_aquisicao" id="ano" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Valor de Conpra</label>
                            <input type="text" name="valor" id="valor" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Imagem</label>
                            <input type="file" name="imagem" class="form-control-file">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Observação</label>
                            <input type="text" name="observacao" class="form-control" placeholder="Se houver">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Salvar</button>
                            <a class="btn btn-primary" href="{{ route('resenhas.index') }}" role="button">
                                <i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </div>

                </form>
                
                
            </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#valor').mask('000.000.000.000.000.00', {reverse: true});
            $('#ano').mask('0000');
        });
    </script>
@endsection