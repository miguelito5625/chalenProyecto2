function registroUsuario() {
    const usuario_cui = document.getElementById('usuario_cui').value;
    const usuario_nombres = document.getElementById('usuario_nombres').value;
    const usuario_apellidos = document.getElementById('usuario_apellidos').value;
    const usuario_nacimiento = document.getElementById('usuario_nacimiento').value;
    const usuario_clave = document.getElementById('usuario_clave').value;


    const datosUsuario = {
        cui: usuario_cui,
        nombres: usuario_nombres,
        apellidos: usuario_apellidos,
        nacimiento: usuario_nacimiento,
        clave: usuario_clave
    };

    console.log(datosUsuario);

    $.ajax({
        url: "../../funciones/guardarUsuario.php",
        type: "post",
        data: datosUsuario,
        success: function (response) {

            console.log(response);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function inicioSesionAdmin() {
    const cui_admin = document.getElementById('cui_admin').value;
    const clave_admin = document.getElementById('clave_admin').value;

    const datosAdmin = {
        cui: cui_admin,
        clave: clave_admin
    };

    // console.log(datosAdmin);

    swalCargando();

    $.ajax({
        url: "../../funciones/iniciarSesionAdmin.php",
        type: "post",
        data: datosAdmin,
        success: function (response) {
            console.log(response);

            if (response.estado === "ok") {
                setTimeout(() => {
                    Swal.fire(
                        'Sesion iniciada!',
                        'Click en el boton para continuar',
                        'success'
                    ).then((result) => {
                        //Redireccionar aqui
                        window.location.href = "../sistema/administrador/principal.html";
                    });
                }, 2000);
            } else {
                setTimeout(() => {
                    Swal.fire(
                        'Usuario no existe',
                        '',
                        'error'
                    ).then((result) => {
                        //Aqui de momento no hacer nada
                    });
                }, 2000);
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}


function inicioSesionUsuario() {
    const cui_usuario = document.getElementById('cui_usuario').value;
    const clave_usuario = document.getElementById('clave_usuario').value;

    const datosUsuario = {
        cui: cui_usuario,
        clave: clave_usuario
    };

    // console.log(datosUsuario);

    swalCargando();

    $.ajax({
        url: "../../funciones/iniciarSesionUsuario.php",
        type: "post",
        data: datosUsuario,
        success: function (response) {
            console.log(response);

            if (response.estado === "ok") {
                setTimeout(() => {
                    Swal.fire(
                        'Sesion iniciada!',
                        'Click en el boton para continuar',
                        'success'
                    ).then((result) => {
                        //Redireccionar aqui
                        const cui = response.usuario[0].cui;
                        const lugar = response.usuario[0].lugar;
                        const dosisuno = response.usuario[0].fecha;
                        const nombre = response.usuario[0].nombres_usuario + ' ' + response.usuario[0].apellidos_usuario;
                        
                        window.location.href = `../sistema/usuario/principal.html?cui=${cui}&nombre=${nombre}&lugar=${lugar}&dosisuno=${dosisuno}`;
                    });
                }, 100);
            } else {
                setTimeout(() => {
                    Swal.fire(
                        'Usuario no existe',
                        '',
                        'error'
                    ).then((result) => {
                        //Aqui de momento no hacer nada
                    });
                }, 2000);
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}


function swalCargando() {
    Swal.fire({
        title: 'Iniciando sesion',
        timerProgressBar: true,
        // timer: 2000,
        didOpen: () => {
            Swal.showLoading()
        }
    }).then((result) => {

    })
}