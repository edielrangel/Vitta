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
        <a class="nav-link" href="#">Livros</a>
        <a class="nav-link" href="#">Autores</a>
        <a class="nav-link" href="{{ route('editoras.index') }}">Editoras</a>
        <a class="nav-link" href="#">Artigos</a>
        <a class="nav-link" href="#">Citações</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseColecoes" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-palette"></i></div>
    Coleções
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseColecoes" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="#">Quadro</a>
        <a class="nav-link" href="#">Gravura</a>
        <a class="nav-link" href="#">Escultura</a>
    </nav>
</div>

<div class="sb-sidenav-menu-heading">Configurações</div>
<a class="nav-link" href="{{ route('entidade.index') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-chess-pawn"></i></div>
    Entidade
</a>

<a class="nav-link" href="{{ route('entidade.index') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
    Usuários
</a>
