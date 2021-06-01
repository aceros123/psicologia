// globalesw
const url = '/formulario';
//selectores HTML
const btnAgregar = document.querySelector('#Guardar-formulario');
//notificaciones emergentes
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
//provider

const postFormulario = async (data) => {

    //varible y referencia con el mismo nombre
    const slugs = slug.value;
    // no encontre la referencia al html
    const token = $('meta[name="csrf-token"]').attr('content');

    try {
        const resp = await fetch(url, {
            method: "POST",
            body: {
                descripcion:data,
                slugs,
                token
            },
            headers: {
                'Content-Type': 'application/json'
            }
        });
        return await resp.Json()

    } catch (err) {
        throw err
    }
}

const agregar = (str) =>{

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
}
//agregar nuevo formulario
const agregarFormulario = async () => {
    //cambiar recipient-name por recipientname en el HTML
    const descrip = recipientname.value;

    const data = await postFormulario(descrip);

    if(!data.ok) throw 'lo sentimos no se pudo obtener los datos';

    const{descripcion} = data;

    agregar(descripcion);

}



//eventos 

btnAgregar.addEventListener('click', agregarFormulario())