<div class="table-responsive-sm">
    <table class="table table-striped" id="autores-table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Nombres</th>
        <th>Apellidos</th>
        <th>Edicion</th>
        <th>Biografia</th>
        <th>Obras</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($autores as $autores)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $autores->aut_nombres }}</td>
            <td>{{ $autores->aut_apellidos }}</td>
            <td>{{ $autores->aut_edicion }}</td>
            <td>{{ $autores->aut_biografia }}</td>
            <td>{{ $autores->aut_ibras }}</td>
                <td>
                    {!! Form::open(['route' => ['autores.destroy', $autores->aut_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('autores.show', [$autores->aut_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('autores.edit', [$autores->aut_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Desea Eliminar?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>