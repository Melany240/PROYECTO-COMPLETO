<!-- Li Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('li_id', 'Libreria:') !!}
    {!! Form::select('li_id', $librerias,null, ['class' => 'form-control']) !!}
</div>

<!-- Emp Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emp_nombres', 'Nombres:') !!}
    {!! Form::text('emp_nombres', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Emp Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emp_apellidos', 'Apellidos:') !!}
    {!! Form::text('emp_apellidos', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Emp Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emp_cedula', 'Cedula:') !!}
    {!! Form::text('emp_cedula', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Emp Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emp_direccion', 'Direccion:') !!}
    {!! Form::text('emp_direccion', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Emp Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emp_telefono', ' Telefono:') !!}
    {!! Form::text('emp_telefono', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Emp Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emp_correo', 'Correo:') !!}
    {!! Form::text('emp_correo', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('empleados.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
