<div class="table-responsive-sm">
    <table class="table table-striped" id="libros-table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Libreria</th>
        <th>Editorial</th>
        <th>Autores </th>
        <th>Nombres Libros</th>
        <th>Año</th>
        <th>Categoria</th>
        <th>Editorial </th>
        <th>Clasificacion </th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($libros as $libros)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $libros->li_nombre_libreria }}</td>
            <td>{{ $libros->edi_nombre_empresa }}</td>
            <td>{{ $libros->lib_autores_ }}</td>
            <td>{{ $libros->lib_nombres_libros }}</td>
            <td>{{ $libros->lib_ano }}</td>
            <td>{{ $libros->lib_categoria }}</td>
            <td>{{ $libros->lib_editorial_ }}</td>
            <td>{{ $libros->lib_clasificacion_ }}</td>
                <td>
                    {!! Form::open(['route' => ['libros.destroy', $libros->lib_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('libros.show', [$libros->lib_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('libros.edit', [$libros->lib_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Desea Eliminar?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>