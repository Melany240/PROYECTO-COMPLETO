<div class="table-responsive-sm">
    <table class="table table-striped" id="librosPrestados-table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Cliente</th>
        <th>Libros</th>
        <th>Fecha Inicio</th>
        <th>Fecha Entrega</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($librosPrestados as $librosPrestados)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $librosPrestados->name }}</td>
            <td>{{ $librosPrestados->lib_nombres_libros }}</td>
            <td>{{ $librosPrestados->lp_fecha_inicio }}</td>
            <td>{{ $librosPrestados->lp_fecha_entrega }}</td>
                <td>
                    {!! Form::open(['route' => ['librosPrestados.destroy', $librosPrestados->lp_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('librosPrestados.show', [$librosPrestados->lp_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('librosPrestados.edit', [$librosPrestados->lp_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Desea Eliminar?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>