<div class="sb-sidenav-menu-heading">Menu</div>
<a class="nav-link" href="{{ route('dashboard') }}">
    <div class="sb-nav-link-icon"><i class="far fa-play-circle"></i></div>
    Início
</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSaude" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-heartbeat"></i></i></div>
    Saúde
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseSaude" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('pressao.index') }}">Pressão Arterial</a>
        <a class="nav-link" href="#">Peso</a>
        <a class="nav-link" href="#">Consultas</a>
        <a class="nav-link" href="#">Exames</a>
        <a class="nav-link" href="#">Outros Documentos</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBiblioteca" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
    Biblioteca
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseBiblioteca" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('editoras.index') }}">Editoras</a>
        <a class="nav-link" href="{{ route('autores.index') }}">Autores</a>
        <a class="nav-link" href="{{ route('livros.index') }}">Livros</a>
        <a class="nav-link" href="{{ route('artigos.index') }}">Artigos</a>
        <a class="nav-link" href="{{ route('resenhas.index') }}">Resenhas</a>
        <a class="nav-link" href="{{ route('citacoes.index') }}">Citações</a>
        <a class="nav-link" href="{{ route('dicionario.index') }}">Dicionário de Termos</a>
    </nav>
</div>

<a class="nav-link" href="{{ route('inventario.index') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
    Inventário
</a>

<div class="sb-sidenav-menu-heading">Configurações</div>
<a class="nav-link" href="{{ route('entidade.index') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-chess-pawn"></i></div>
    Entidade
</a>

<a class="nav-link" href="{{ route('entidade.index') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
    Usuários
</a>
