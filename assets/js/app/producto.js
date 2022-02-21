const URL = 'http://localhost/mvc/';
window.onload = () => {
    
    //Leer formulario
    const form = document.querySelector('#form');
    if (form){ form.addEventListener('submit', validarForm); }

    //Editar
    const editar = document.querySelectorAll('.editar');
    if( editar ){
        editar.forEach(element => {
            element.addEventListener('click', editarRegistro );
        });
    }

    //Eliminar
    const eliminar = document.querySelectorAll('.eliminar');
    if( eliminar ){
        eliminar.forEach(element => {
            element.addEventListener('click', eliminarRegistro );
        });
    } 

}

function validarForm( e ){
    e.preventDefault();
    ajax( mostrarDatos );
}

function ajax( callback ){
    const data = new FormData( document.querySelector('#form') );
    const url = URL +"producto/accion";
    const http = new XMLHttpRequest();
    http.onreadystatechange = function() {
        if( this.readyState === 4 && this.status === 200 ){
            callback.apply( http );
        } 
    }
    http.open("POST", url);
    http.send( data );
}

function mostrarDatos(){
    const respuesta = JSON.parse( this.responseText ); 
    const icon = respuesta.icon;
    const title = respuesta.title;
    const text = respuesta.text;
    actualizarTabla();
    alerta(icon, title, text, 1500);
    
}


function alerta(tipo, titulo, mensaje, tiempo){
    Swal.fire({
        position: 'center',
        icon: tipo,
        title: titulo,
        text: mensaje,
        showConfirmButton: false,
        timer: tiempo
    });
}

function actualizarTabla( ){
    const nombre = document.querySelector('#nombre').value;
    const precio = document.querySelector('#precio').value;
    //const id = document.querySelector('#id').value;
    if( document.querySelector('#id') ){
        console.log('editar');
        //Editar
        const id = document.querySelector('#id').value;
        document.querySelector('#form').reset();
        const registro = document.querySelector("[data-id='"+ id +"']").parentNode.parentNode;
        registro.innerHTML = `
        <tr>
            <td scode="1">${nombre}</td>
            <td scode="1">${precio}</td>
            <td scode="2">
                <a href="#" data-id="${id}" class="text-uppercase btn btn-success editar">Editar</a>
                <a href="#" data-id="${id}" class="text-uppercase btn btn-danger eliminar">Eliminar</a>
            </td>
        </tr>
        `;
        const inputId = document.querySelector("#id");
        if( inputId ){ inputId.remove(); }
    } else {
        console.log('Nuevo');
        //Insertar, el Modelo no retorna el id, por lo que se refrescara la página
        window.href = URL + 'producto/index';
        location.reload();
    }
}


function editarRegistro( e ){
    e.preventDefault();
    const id = e.target.dataset.id;
    const data = new FormData();
    data.append( 'id', id );
    const url = URL +"producto/findRegistro";
    const http = new XMLHttpRequest();
    http.onreadystatechange = function() {
        if( this.readyState === 4 && this.status === 200 ){
            const respuesta = JSON.parse( this.responseText );
            llenarForm( respuesta );
        } 
    }
    http.open("POST", url);
    http.send( data );
}

function llenarForm( respuesta ){
    const id = respuesta.id;
    const nombre = respuesta.nombre;
    const precio = respuesta.precio;
    
    document.querySelector('#nombre').value = nombre;
    document.querySelector('#nombre').focus();
    document.querySelector('#precio').value = precio;

    //Creamos el Input ID
    const inputId = document.createElement('INPUT');
    inputId.value = id;
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.id = 'id';
    document.querySelector('#form').appendChild(inputId);
}

function eliminarRegistro( e ){
    e.preventDefault();
    
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Una vez eliminado, no hay vuelta atras!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            const id = e.target.dataset.id;
            const data = new FormData();
            data.append( 'id', id)
            
            const url = URL +"producto/deleteRegistro";
            const http = new XMLHttpRequest();
            http.onreadystatechange = function() {
                if( this.readyState === 4 && this.status === 200 ){
                    const respuesta = JSON.parse( this.responseText );
                    RemoverRegistro( respuesta, id );
                } 
            }
            http.open("POST", url);
            http.send( data );
        }
      });
}


function RemoverRegistro( respuesta, id ){
    const icon = respuesta.icon;
    const title = respuesta.title;
    const text = respuesta.text;
    alerta( icon, title, text, 1500 );
    document.querySelector("[data-id='"+ id +"']").parentNode.parentNode.remove();
    //document.querySelector("[data-id='"+ id +"']").revover();

}