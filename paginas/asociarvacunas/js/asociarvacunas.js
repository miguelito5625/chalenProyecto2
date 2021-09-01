var centro_vacunacion = "";
var idVacuna = 0;
var idUsuario = 0;
var fecha = "";

$(document).ready(function () {



    var tabla_usuarios = $('#tabla_usuarios').DataTable({
        "ajax": '../../funciones/listarusuarios.php'
    });

    $('#tabla_usuarios tbody').on('click', 'tr', function () {
        const rowData = tabla_usuarios.row(this).data();
        console.log(rowData);
        idUsuario = rowData[0];
        document.getElementById("inputUsuarioSeleccionado").value = `Cui: ${rowData[1]}, nombre: ${rowData[2]} ${rowData[3]}`;
        $('#modalUsuarios').modal('hide');
    });


    $.ajax({
        url: "../../funciones/listarvacunas.php",
        type: "get",
        data: {},
        success: function (response) {
            console.log(response.data);

            response.data.forEach(element => {
                $("#selectVacunas").append(`<option value="${element[0]}">${element[1]}</option>`);
            });

            $("#selectVacunas").selectpicker("refresh"); 


        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });


    $.ajax({
        url: "../../funciones/listarcentrovacunacion.php",
        type: "get",
        data: {},
        success: function (response) {
            console.log(response.data);

            response.data.forEach(element => {
                $("#selectCentrosVacunacion").append(`<option value="${element.nombre}">${element.nombre}</option>`);
            });

            $("#selectCentrosVacunacion").selectpicker("refresh"); 


        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

    $('#selectVacunas').on('change', function(){
        var selected = []
        selected = $('#selectVacunas').val()
        idVacuna = selected;
    });

    $('#selectCentrosVacunacion').on('change', function(){
        var selected = []
        selected = $('#selectCentrosVacunacion').val()
        centro_vacunacion = selected;
    });

});

function guardarAsociacion(){

    const datos = {
        fecha: document.getElementById("fecha_vacunacion").value,
        lugar: centro_vacunacion,
        idUsuario: idUsuario,
        idVacuna: idVacuna
    };

    console.log(datos);

}