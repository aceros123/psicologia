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
guardar_formulario = document.getElementById("Guardar-formulario")
if (guardar_formulario) {
    guardar_formulario.addEventListener("click", agregarForm);
    //detecta el clic del id guardar-formulario
    function agregarForm() {
        //inicia la funcion agregarForm
        let descripcion = $('#descripcion').val();
        let Slug = $('#slug').val();
        let _URL = `/formulario`
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            Headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: "POST",
            url: _URL,
            data: {
                descripcion: descripcion,
                slug: Slug,
                _token: _token
            },
            dataType: "json",
            success: function (data) {
                formulario = data
                $('#list').prepend(`
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
                Slug.value = " ";
                $('#recipient-name').val(' ');
                $('#exampleModal').modal('hide');

                document.location.reload();
            },
            error: (err) => {

                throw err //cuando detecte el error me detiene la ejecucion y manda mensaje por consola
            }
        });

    }
    //termina la funcion de agregar formulario
    //funcion de borrar formulario

    function deleteForm(formulario) {

        if (!confirm("¿En realidad quieres eliminar este formulario?")) {
            return false;
        }


        let slug = `${formulario.slug}`;
        let token = $('meta[name="csrf-token"]').attr('content');
        let url = `formulario/` + slug

        $.ajax(
            {
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: url, //or you can use url: "company/"+id,
                type: 'DELETE',
                data: {

                },
                success: function (response) {

                    $("#success").html(response.message)

                    Swal.fire(
                        'Felicidades',
                        'Se ha eliminado correctamente el formulario!',
                        'success'
                    )
                    document.location.reload();

                },
                error: (err) => {
                    throw err //cuando detecte el error me detiene la ejecucion y manda mensaje por consola
                }
            });
        return false;




        //prueba

        // let id = `${formulario.slug}`
        // let url = `formulario/`+id
        // let token = $('meta[name="csrf-token"]').attr('content');
        // // let descripcion =  `${formulario.descripcion}`
        // // let slug = `${formulario.slug}`

        // console.log(url)
        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN':token
        //     },
        //     url: url,
        //     type:'DELETE',
        //     dataType: "JSON",
        //     success: function (response) {

        //         console.log(response)
        //         //$('#deleteform'+formulario.id).remove(); 

        //     },
        //     error: (err) => {
        //         console.log("ya vali")
        //         throw err //cuando detecte el error me detiene la ejecucion y manda mensaje por consola
        //     }

        // });
    }
    //editar
    
    
    function editForm(formulario) {
        let slug = `${formulario.slug}`;
        let token = $('meta[name="csrf-token"]').attr('content');
        let url = `formulario/` + slug ;

        fetch(url, {
            headers: {
                'X-CSRF-TOKEN': token
            },
            method: 'PUT',
            body: {
                descripcion: "hola",
                slug: "hola"
            }

        })
            .then(data => console.log(data))
    }
    //fin editar
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
    const exampleModaleditar = document.getElementById('exampleModaleditar')
    exampleModaleditar.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        const modalTitle = exampleModaleditar.querySelector('.modal-title')
        const modalBodyInput = exampleModaleditar.querySelector('.modal-body input')

        modalTitle.textContent = recipient

    })
}
//fin index.blade.php
//create.blade
$(document).ready(function () {
    $("#descripcion").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });

});
//fin create.blade
$(document).ready(function () {
    $("#descripcionE").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slugE',
        space: '-'
    });

});