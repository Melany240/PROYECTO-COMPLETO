<div class="table-responsive-sm">
    <table class="table table-striped" id="editoriales-table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Autor</th>
        <th>Nombre Empresa</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Correo</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($editoriales as $editoriales)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $editoriales->aut_nombres.' '.$editoriales->aut_apellidos }}</td>
            <td>{{ $editoriales->edi_nombre_empresa }}</td>
            <td>{{ $editoriales->edi_telefono }}</td>
            <td>{{ $editoriales->edi_direccion }}</td>
            <td>{{ $editoriales->edi_correo }}</td>
                <td>
                    {!! Form::open(['route' => ['editoriales.destroy', $editoriales->edi_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('editoriales.show', [$editoriales->edi_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('editoriales.edit', [$editoriales->edi_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Desea Eliminar?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>