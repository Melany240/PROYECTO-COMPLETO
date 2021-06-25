<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
@if(Auth::user()->clie_tipo=='A')
<li class="nav-item {{ Request::is('librerias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('librerias.index') }}">
        <i class="fas fa-book-reader"></i>
        <span>Librerias</span>
    </a>
</li>


<li class="nav-item {{ Request::is('autores*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('autores.index') }}">
        <i class="fas fa-user-friends"></i>
        <span>Autores</span>
    </a>
</li>

<li class="nav-item {{ Request::is('libros*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('libros.index') }}">
       <i class="fas fa-book"></i>
        <span>Libros</span>
    </a>
</li>
<li class="nav-item {{ Request::is('editoriales*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('editoriales.index') }}">
       <i class="fas fa-pen-square"></i>
        <span>Editoriales</span>
    </a>
</li>
<li class="nav-item {{ Request::is('empleados*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('empleados.index') }}">
        <i class="fas fa-user-tie"></i>
        <span>Empleados</span>
    </a>
</li>
<li class="nav-item {{ Request::is('librosPrestados*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('librosPrestados.index') }}">
        <i class="fas fa-book-open"></i>
        <span>Libros Prestados</span>
    </a>
</li>

<li class="nav-item {{ Request::is('facturas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('facturas.index') }}">
       <i class="fas fa-file-invoice-dollar"></i>
        <span>Facturas</span>
    </a>
</li>

<li class="nav-item {{ Request::is('personas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('personas.index') }}">
        <i class="fas fa-users"></i>
        <span>Personas</span>
    </a>
</li>
@endif
@if(Auth::user()->clie_tipo=='T')
<li class="nav-item {{ Request::is('librosPrestados*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('librosPrestados.index') }}">
        <i class="fas fa-book-open"></i>
        <span>Libros Prestados</span>
    </a>
</li>

<li class="nav-item {{ Request::is('facturas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('facturas.index') }}">
       <i class="fas fa-file-invoice-dollar"></i>
        <span>Facturas</span>
    </a>
</li>
<li class="nav-item {{ Request::is('autores*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('autores.index') }}">
        <i class="fas fa-user-friends"></i>
        <span>Autores</span>
    </a>
</li>

<li class="nav-item {{ Request::is('libros*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('libros.index') }}">
       <i class="fas fa-book"></i>
        <span>Libros</span>
    </a>
</li>
@endif
