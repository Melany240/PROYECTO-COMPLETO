<div class="table-responsive-sm">
    <table class="table table-striped" id="empleados-table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Libreria</th>
        <th> Nombres</th>
        <th>Apellidos</th>
        <th>Cedula</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th> Correo</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleados)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $empleados->li_nombre_libreria }}</td>
            <td>{{ $empleados->emp_nombres }}</td>
            <td>{{ $empleados->emp_apellidos }}</td>
            <td>{{ $empleados->emp_cedula }}</td>
            <td>{{ $empleados->emp_direccion }}</td>
            <td>{{ $empleados->emp_telefono }}</td>
            <td>{{ $empleados->emp_correo }}</td>
                <td>
                    {!! Form::open(['route' => ['empleados.destroy', $empleados->emp_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('empleados.show', [$empleados->emp_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('empleados.edit', [$empleados->emp_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Desea Eliminar?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>