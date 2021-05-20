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

<section class="list">
    <div class="contenedor grid-4">
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
                        <a class="dropdown-item" href="{{route('Admin.Forms.edit', $formulario)}}">Editar</a>
                    </li>
                    <li>
                        <form action="{{route('Admin.Forms.destroy', $formulario)}}" method="post" class="formulario-eliminar">     
                            @csrf
                            @method('delete')
                            <input class="dropdown-item" type="submit" value="Eliminar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
        <!-- fin tarjeta a repetir -->
        <a href="{{route('Admin.Forms.create')}}">
            <div class="card card-mod" id="create">
                <h2><i class="fa fa-plus fa-6" aria-hidden="true"></i></h2>
            </div>
        </a>
    </div>
</section>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    $(".formulario-eliminar").submit(function (e) { 
            e.preventDefault();
            
      
        Swal.fire({
        title: '¿Esta seguro de eliminar este formulario?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Cancelar`,
        denyButtonText: `Eliminar`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire('Cancelado', '', 'info')

         } else if (result.isDenied) {
            Swal.fire('El formulario se a eliminado con exito', '', 'success') 
            this.submit();
         }
        })
    });
    </script>
@endsection