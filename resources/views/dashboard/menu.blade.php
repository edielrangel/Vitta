<div class="sb-sidenav-menu-heading">Menu</div>
<a class="nav-link" href="index.html">
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
        <a class="nav-link" href="layout-static.html">Pressão Arterial</a>
        <a class="nav-link" href="layout-static.html">Peso</a>
        <a class="nav-link" href="layout-sidenav-light.html">Consultas</a>
        <a class="nav-link" href="layout-sidenav-light.html">Exames</a>
        <a class="nav-link" href="layout-sidenav-light.html">Outros Documentos</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBiblioteca" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
    Biblioteca
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseBiblioteca" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="layout-static.html">Livros</a>
        <a class="nav-link" href="layout-sidenav-light.html">Autores</a>
        <a class="nav-link" href="layout-sidenav-light.html">Editoras</a>
        <a class="nav-link" href="layout-static.html">Artigos</a>
        <a class="nav-link" href="layout-sidenav-light.html">Citações</a>
    </nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseColecoes" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-palette"></i></div>
    Coleções
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseColecoes" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="layout-static.html">Quadro</a>
        <a class="nav-link" href="layout-sidenav-light.html">Gravura</a>
        <a class="nav-link" href="layout-sidenav-light.html">Escultura</a>
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
