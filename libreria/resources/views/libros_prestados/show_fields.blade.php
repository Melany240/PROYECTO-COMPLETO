<!-- Clie Id Field -->
<div class="form-group">
    {!! Form::label('clie_id', 'Cliente:') !!}
    <p>{{ $librosPrestados->clie_id }}</p>
</div>

<!-- Lib Id Field -->
<div class="form-group">
    {!! Form::label('lib_id', 'Libro:') !!}
    <p>{{ $librosPrestados->lib_id }}</p>
</div>

<!-- Lp Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('lp_fecha_inicio', 'Fecha Inicio:') !!}
    <p>{{ $librosPrestados->lp_fecha_inicio }}</p>
</div>

<!-- Lp Fecha Entrega Field -->
<div class="form-group">
    {!! Form::label('lp_fecha_entrega', 'Fecha Entrega:') !!}
    <p>{{ $librosPrestados->lp_fecha_entrega }}</p>
</div>

