<?php
$fecha_nacimiento=date_format(date_create($personas->clie_fenac), "d/m/Y")
?>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Ent Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clie_telefono', 'Telefono:') !!}
    {!! Form::text('clie_telefono', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Ent Rep Legal Field -->

<!-- Ent Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clie_cedula', 'Cedula:') !!}
    {!! Form::text('clie_cedula', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Ent Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clie_genero', 'Genero:') !!}
    {!! Form::select('clie_genero',['MUJER'=>'MUJER','HOMBRE'=>'HOMBRE'] ,null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Ent Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clie_direccion', 'Direccion:') !!}
    {!! Form::text('clie_direccion', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Ent Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clie_tipo', 'Tipo:') !!}
    {!! Form::select('clie_tipo',['C'=>'Cliente','A'=>'Administrador','T'=>'Trabajador'] ,null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Ent Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clie_estadocivil', 'Estado Civil:') !!}
    {!! Form::select('clie_estadocivil', ['Soltero'=>'Soltero',
    'Casado'=>'Casado',
    'Viudo'=>'Viudo',
    'Divorciado'=>'Divorciado',
    'Union Libre'=>'Union Libre'] ,null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Ent Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clie_usuario', 'Usuario:') !!}
    {!! Form::text('clie_usuario', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<!-- Ent Rep Legal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Clave:') !!}
    <input type="password" class="form-control" name="password" id="password" required="">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('clie_fenac', 'Fecha Nacimiento:') !!}
    {!! Form::text ('clie_fenac', $fecha_nacimiento, ['class' => 'form-control','required'=>'required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('personas.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>