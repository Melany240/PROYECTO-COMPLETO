<table class="table">
	<tr>
		<th>Nº</th>
		<th>Nombre</th>
		<th>Tipo</th>
		<th>Usuario</th>
		<th>Email</th>

		<th>Estado</th>
		<th>...</th>
	</tr>
	@foreach($personas as $p)
	<tr>
			 <td>{{ $loop->iteration}} </td>
             <td>{{ $p->name }}</td>

             @if($p->clie_tipo=='A')
             <td>Administrador</td>
             @endif
             @if($p->clie_tipo=='T')
             <td>Trabajador</td>
             @endif
             @if($p->clie_tipo=='C')
             <td>Cliente</td>
             @endif

             
            <td>{{ $p->clie_usuario }}</td>
            <td>{{ $p->email }}</td>
    
            @if($p->clie_estado==1)
             <td>Activo</td>
            @else
            <td>Inactivo</td>
             @endif
                <td>
                	<div class="btn-group">
                		<a href="{{ route('personas.edit', [$p->clie_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                	</div>
                </td>
            </tr>
	@endforeach
</table>