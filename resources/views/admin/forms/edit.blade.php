@extends('layouts.LayoutsAdmin')

@section('title', 'Editar formulario')

@section('edit')

@if (session('info'))
    <div class="alert alert-success">
        <Strong>{{session('info')}}</Strong>
    </div>
    
@endif
<div class="container">
    <div class="card">
        <div class="card-body">
            {!! Form::model($formulario, ['route' => ['Admin.Forms.update', $formulario], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion') !!}
                {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder'=> 'ingrese la descripcion del formulario']) !!}
            
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder'=> 'ejemplo: hola-como-esta', 'readonly']) !!}
               
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
            </div>
                {!! Form::submit('Actualizar formulario', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
        </div>
    </div>
</div>
{!! Form::open(['route' => 'Admin.Preguntas.store']) !!}
{!! Form::submit('Agregar nueva pregunta', ['class'=> 'btn btn-primary']) !!}
{!! Form::close() !!}




@endsection



@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

@endsection