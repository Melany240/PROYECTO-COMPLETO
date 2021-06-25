<!-- Li Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('li_id', 'Libreria:') !!}
    {!! Form::select('li_id',$librerias ,null, ['class' => 'form-control']) !!}
</div>

<!-- Edi Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edi_id', 'Editorial:') !!}
    {!! Form::select('edi_id',$editoriales ,null, ['class' => 'form-control']) !!}
</div>

<!-- Lib Autores  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lib_autores_', 'Autores :') !!}
    {!! Form::text('lib_autores_', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Lib Nombres Libros Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lib_nombres_libros', 'Nombres Libros:') !!}
    {!! Form::text('lib_nombres_libros', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Lib Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lib_ano', 'Año:') !!}
    {!! Form::text('lib_ano', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Lib Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lib_categoria', 'Categoria:') !!}
    {!! Form::text('lib_categoria', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Lib Editorial  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lib_editorial_', 'Editorial :') !!}
    {!! Form::text('lib_editorial_', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Lib Clasificacion  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lib_clasificacion_', 'Clasificacion :') !!}
    {!! Form::text('lib_clasificacion_', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('libros.index') }}" class="btn btn-danger">Cancelar</a>
</div>
