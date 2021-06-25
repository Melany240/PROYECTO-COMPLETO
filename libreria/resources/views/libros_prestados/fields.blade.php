<!-- Clie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clie_id', 'Cliente:') !!}
    {!! Form::select('clie_id', $clientes,null, ['class' => 'form-control']) !!}
</div>

<!-- Lib Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lib_id', 'Libro:') !!}
    {!! Form::select('lib_id',$libros ,null, ['class' => 'form-control']) !!}
</div>

<!-- Lp Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lp_fecha_inicio', 'Fecha Inicio:') !!}
    {!! Form::text('lp_fecha_inicio', null, ['class' => 'form-control','id'=>'lp_fecha_inicio']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#lp_fecha_inicio').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Lp Fecha Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lp_fecha_entrega', 'Fecha Entrega:') !!}
    {!! Form::text('lp_fecha_entrega', null, ['class' => 'form-control','id'=>'lp_fecha_entrega']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#lp_fecha_entrega').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('librosPrestados.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
