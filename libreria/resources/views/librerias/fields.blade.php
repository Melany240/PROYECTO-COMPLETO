<!-- Li Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('li_rep_legal', 'Representante:') !!}
    {!! Form::text('li_rep_legal', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Li Ubicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('li_ubicacion', 'Ubicacion:') !!}
    {!! Form::text('li_ubicacion', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Li Nombre Libreria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('li_nombre_libreria', 'Libreria:') !!}
    {!! Form::text('li_nombre_libreria', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Li Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('li_correo', 'Correo:') !!}
    {!! Form::text('li_correo', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Li Sitio Web Field -->
<div class="form-group col-sm-6">
    {!! Form::label('li_sitio_web', 'Sitio Web:') !!}
    {!! Form::text('li_sitio_web', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Li Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('li_telefono', 'Telefono:') !!}
    {!! Form::text('li_telefono', null, ['class' => 'form-control','maxlength'=>100,'maxlength'=>100]) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('librerias.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
