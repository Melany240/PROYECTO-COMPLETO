<!-- Aut Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aut_nombres', 'Nombres:') !!}
    {!! Form::text('aut_nombres', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Aut Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aut_apellidos', 'Apellidos:') !!}
    {!! Form::text('aut_apellidos', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Aut Edicion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aut_edicion', 'Edicion:') !!}
    {!! Form::text('aut_edicion', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Aut Biografia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aut_biografia', 'Biografia:') !!}
    {!! Form::text('aut_biografia', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Aut Ibras Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aut_ibras', 'Obras:') !!}
    {!! Form::text('aut_ibras', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('autores.index') }}" class="btn btn-danger pull-right">Cancelar</a>
</div>
