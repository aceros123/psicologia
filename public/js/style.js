//index.blade.php
//push de confirmacion
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
//prueba de modal 
document.getElementById("Guardar-formulario").addEventListener("click", agregarForm);

function agregarForm() {

    var descripcion = $('#recipient-name').val();
    var Slug = $('#slug').val();
    let _URL = `localhost/formulario`
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: "POST",
        url: `/formulario`,
        data: {
            descripcion: descripcion,
            slug: Slug,
            _token: _token
        },
        dataType: "json",
        success: function (data) {
            formulario = data
            $('#list').append(`
                <div class="card card-mod">
                <img src="{{ asset('../img/prueba.jpg') }}" alt="">
                <div class="opacidad">
                    <p>${formulario.descripcion}</p>
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
            `);
            Slug.value =  " ";
            $('#recipient-name').val(' ');
            $('#exampleModal').modal('hide');

        document.location.reload();
        },
        error: (err) => {
            throw err //cuando detecte el error me detiene la ejecucion y manda mensaje por consola
        }
    });

}
const exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = 'Nuevo ' + recipient
  
})


//fin index.blade.php
//create.blade
$(document).ready(function () {
    $("#recipient-name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });

});
//fin create.blade
