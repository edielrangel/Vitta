@extends('layouts.dashboard.master')

@section('menu')
    @include('dashboard.menu')
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-book mr-2"></i>Livros</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Biblioteca</a></li>
            <li class="breadcrumb-item active">Livros</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus mr-1"></i>
                Adicionar Livro
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
                    <form action="{{ route('livros.store') }}" method="POST">
                        @method('POST')
                        @csrf

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Título</label>
                                <input type="text" class="form-control" max="200" min="5" name="titulo" value="{{ old('titulo') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Subtítulo</label>
                                <input type="text" class="form-control" max="200" min="5" name="subtitulo" value="{{ old('subtitulo') }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Editora</label>
                                <select name="editora_id" class="form-control">
                                    @foreach ($editoras as $editora)
                                        <option value="{{ $editora->id }}">{{ $editora->editora }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1 mb-3">
                                <label>Edição</label>
                                <input type="text" class="form-control" name="edicao" value="{{ old('edicao') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Cidade</label>
                                <input type="text" class="form-control" min="3" name="cidade" value="{{ old('cidade') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Ano</label>
                                <input type="text" class="form-control" name="ano" id="ano" value="{{ old('ano') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Páginas</label>
                                <input type="number" class="form-control" min="1" name="paginas" value="{{ old('paginas') }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label>ISBN</label>
                                <input type="number" class="form-control" name="isbn" value="{{ old('isbn') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>CDD</label>
                                <input type="text" class="form-control" min="1" name="cdd" value="{{ old('cdd') }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>CDU</label>
                                <input type="text" class="form-control" min="1" name="cdu" value="{{ old('cdu') }}" autocomplete="off">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Livro Físico?</label>
                                <select name="fisico" class="form-control">
                                        <option value="1" selected>Sim</option>
                                        <option value="0">Não</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Notas</label>
                                <input type="text" class="form-control" min="3" max="50" name="notas" value="{{ old('notas') }}" autocomplete="off" placeholder="Ex: Tradução de: Fulano de Tal">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Categorias (Palavras-Chave)</label>
                                <input type="text" class="form-control" min="3" max="50" name="categoria" value="{{ old('categoria') }}" autocomplete="off">
                                <small id="emailHelp" class="form-text text-muted">Separe cada uma por Ponto e Vírgula (;). </small>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Descrição da Obra</label>
                                <textarea class="form-control" name="descricao" value="{{ old('descricao') }}">{{ old('descricao') }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Origem</label>
                                <select name="origem" class="form-control" required>
                                    <option value="1" selected>Aquisição</option>
                                    <option value="2">Presente</option>
                                    <option value="3">Outros</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label>Preço</label>
                                <input type="text" class="form-control" name="preco" id="preco" value="{{ old('preco') }}" autocomplete="off">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label>Data Aquisição</label>
                                <input type="date" class="form-control" name="dtAquisicao" value="{{ old('dtAquisicao') }}" autocomplete="off" required>
                                <small id="emailHelp" class="form-text text-muted">Compreende a data que entrou para a coleção. </small>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>Observação</label>
                                <input type="text" class="form-control" name="observacao" value="{{ old('observacao') }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Salvar</button>
                                <a class="btn btn-primary" href="{{ route('livros.index') }}" role="button">
                                    <i class="fas fa-ban"></i> Cancelar</a>
                            </div>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#preco').mask('000.000.000.000.000.00', {reverse: true});
            $('#ano').mask('0000');
        });
    </script>
@endsection