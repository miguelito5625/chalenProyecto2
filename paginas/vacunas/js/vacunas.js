function guardarVacuna() {

    const nombre_vacuna = document.getElementById('nombre_vacuna').value;

    const datosVacuna = {
        nombre: nombre_vacuna
    };


    $.ajax({
        url: "../../funciones/guardarVacuna.php",
        type: "post",
        data: datosVacuna,
        success: function(response) {

            console.log(response);
            alert("Vacuna creada");

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            alert("Error: No se creo la vacuna")
        }
    });
}