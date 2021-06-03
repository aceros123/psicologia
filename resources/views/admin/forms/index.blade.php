@extends('layouts.LayoutsAdmin')

@section('title', 'Formularios')

@section('index')
<section class="create">
    <div class="contenedor grid-4">
        <div class="card card-mod">
            <h1>Lorem ipsum.</h1>
        </div>
        <div class="card card-mod">
            <h1>Lorem ipsum.</h1>
        </div>
        <div class="card card-mod">
            <h1>Lorem ipsum.</h1>
        </div>
        <div class="card card-mod">
            <h1>Lorem ipsum.</h1>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="descripcion" class="col-form-label">Titulo</label>
                        <input type="text" class="form-control" id="descripcion">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Slug</label>
                        <input class="form-control" id="slug" disabled="true"></input>
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                <button type="button" class="btn btn-primary" id="Guardar-formulario">Guardar formulario</button>
            </div>
        </div>
    </div>
</div>
{{-- editar --}}
<div class="modal fade" id="exampleModaleditar" tabindex="-1" aria-labelledby="exampleModalLabeleditar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="descripcion" class="col-form-label">Titulo</label>
                        <input type="text" class="form-control" id="descripcionE">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Slug</label>
                        <input class="form-control" id="slugE" disabled="true"></input>
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                <button type="button" class="btn btn-primary" onclick="editForm()">Editar formulario</button>
            </div>
        </div>
    </div>
</div>
{{-- fin editar --}}
<section class="list" id="list">
    <div class="contenedor grid-4">
        <div class="card card-mod" id="crear-form" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Formulario">
            <h2><i class="fa fa-plus fa-6" aria-hidden="true"></i></h2>
        </div>
        {{-- <a href="{{route('Admin.Forms.create')}}">
        <div class="card card-mod" id="create">
            <h2><i class="fa fa-plus fa-6" aria-hidden="true"></i></h2>
        </div>
        </a> --}}
        <!-- tarjeta a repetir -->
        @foreach ($formularios as $formulario)

        <div class="card card-mod">
            <img src="{{ asset('img/prueba.jpg') }}" alt="">
            <div class="opacidad">
                <p>{{$formulario->descripcion}}</p>
            </div>
            <div class="btn-group dropend">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" type="submit" id="editar" data-id="{{$formulario}}" data-bs-toggle="modal" data-bs-target="#exampleModaleditar" data-bs-whatever="Editar formulario">Editar</a>
                        
                        {{-- href="{{route('Admin.Forms.edit', $formulario)}} --}}
                    </li>
                    <li>
                        <a class="dropdown-item formulario-eliminar" type="submit"  onclick="deleteForm({{$formulario}})" data-bs-toggle="eliminarmodal" data-bs-target="#eliminarmodal">Eliminar</a>
                        {{-- <form action="{{route('Admin.Forms.destroy', $formulario)}}" method="post" class="formulario-eliminar">
                           <p> {{ route('Admin.Forms.destroy', $formulario) }}</p>
                            @csrf
                            @method('delete')
                            <input class="dropdown-item" type="submit" value="Eliminar" data-bs-toggle="eliminarmodal" data-bs-target="#eliminarmodal">
                        </form>  --}}
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
        <!-- fin tarjeta a repetir -->

    </div>
</section>
@endsection
@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection