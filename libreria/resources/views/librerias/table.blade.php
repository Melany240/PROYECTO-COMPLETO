<div class="table-responsive-sm">
    <table class="table table-striped" id="librerias-table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Representante</th>
        <th>Ubicacion</th>
        <th>Libreria</th>
        <th>Correo</th>
        <th>Sitio Web</th>
        <th>Telefono</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($librerias as $librerias)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $librerias->li_rep_legal }}</td>
            <td>{{ $librerias->li_ubicacion }}</td>
            <td>{{ $librerias->li_nombre_libreria }}</td>
            <td>{{ $librerias->li_correo }}</td>
            <td>{{ $librerias->li_sitio_web }}</td>
            <td>{{ $librerias->li_telefono }}</td>
                <td>
                    {!! Form::open(['route' => ['librerias.destroy', $librerias->li_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('librerias.show', [$librerias->li_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('librerias.edit', [$librerias->li_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Desea Eliminar?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>