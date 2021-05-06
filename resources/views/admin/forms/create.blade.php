@extends('layouts.LayoutsAdmin')

@section('title', 'Nuevo formulario')

@section('create')
@if (session('info'))
    <div class="alert alert-success">
        <Strong>{{session('info')}}</Strong>
    </div>
    
@endif
<div class="container">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'Admin.Forms.store']) !!}
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
                {!! Form::submit('Crear formulario', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#descripcion").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection