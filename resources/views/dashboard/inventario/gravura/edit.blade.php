@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.inventario.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-image mr-2"></i>Gravuras</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('bibliotecas.index') }}">Inventário</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('gravuras.index') }}">Gravuras</a></li>
            <li class="breadcrumb-item active">Editar Dados da Gravuras</li>
        </ol>
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <a href="{{ url('storage/img/inventario/gravuras/'.$gravura->imagem) }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ url('storage/img/inventario/gravuras/'.$gravura->imagem) }}" alt="{{ $gravura->titulo ?? '' }}" class="img-thumbnail"></a>
                </div>
            </div>
        
            <div class="col-sm-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-image mr-1"></i>
                        Gravura: <strong>{{ $gravura->titulo ?? '' }}</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gravuras.update', $gravura->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Tipo</label>
                                    <select name="tipo_gravura" class="form-control">
                                        <option value="{{ $gravura->tipo_gravura }}" selected>{{ $gravura->tipo_gravura }}</option>
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
                                        <option value="{{ $gravura->cor }}" selected>{{ $gravura->cor }}</option>
                                        <option value="Nomocromático">Nomocromático</option>
                                        <option value="Policromático">Policromático</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label>Acid</label>
                                    <select name="acid" class="form-control">
                                        <option value="{{ $gravura->acid }}" selected>{{ $gravura->acid }}</option>
                                        <option value="Sim">Sim</option>
                                        <option value="Não">Não</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" value="{{ $gravura->estado }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control" value="{{ $gravura->titulo ?? '' }}">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label>Artista</label>
                                    <input type="text" name="artista" class="form-control" value="{{ $gravura->artista }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Tiragem</label>
                                    <input type="text" name="tiragem" class="form-control" value="{{ $gravura->tiragem ?? 'N/A' }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Ano de Aquisição</label>
                                    <input type="text" name="ano_aquisicao" id="ano" class="form-control" value="{{ $gravura->ano_aquisicao }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Valor de Compra</label>
                                    <input type="text" name="valor" id="valor" class="form-control" value="{{ $gravura->valor ?? '0.00' }}">
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Observação</label>
                                    <input type="text" name="observacao" class="form-control" value="{{ $gravura->observacao ?? '' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Nova Imagem</label>
                                    <input type="file" name="imagem" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Atualizar</button>
                                    <a class="btn btn-primary" href="{{ route('gravuras.index') }}" role="button">
                                        <i class="fas fa-ban"></i> Cancelar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
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