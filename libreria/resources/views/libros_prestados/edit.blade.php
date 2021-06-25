@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('librosPrestados.index') !!}">Libros Prestados</a>
          </li>
          <li class="breadcrumb-item active">Editar</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Editar Libros Prestados</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($librosPrestados, ['route' => ['librosPrestados.update', $librosPrestados->lp_id], 'method' => 'patch']) !!}

                              @include('libros_prestados.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection