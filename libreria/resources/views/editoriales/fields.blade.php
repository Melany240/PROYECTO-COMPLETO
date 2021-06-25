<!-- Aut Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aut_id', 'Autor:') !!}
    {!! Form::select('aut_id', $autores,null, ['class' => 'form-control']) !!}
</div>

<!-- Edi Nombre Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edi_nombre_empresa', ' Nombre Empresa:') !!}
    {!! Form::text('edi_nombre_empresa', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Edi Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edi_telefono', 'Telefono:') !!}
    {!! Form::text('edi_telefono', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Edi Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edi_direccion', ' Direccion:') !!}
    {!! Form::text('edi_direccion', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Edi Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edi_correo', 'Correo:') !!}
    {!! Form::text('edi_correo', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('editoriales.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
