// bd.js

function compraBoleto() {
    
    var object = {
        nombre: $("#inp_name").val(),
        apellidos: $("#inp_first_name").val(),
        destino: $("#inp_destiny").val(),
        origen: $("#inp_origin").val(),
        precio: $("#inp_cost").val(),
        asiento: $("#_select select").val() // Obtener el número de asiento seleccionado
    };

    console.log(object); 

    $.ajax({
        data: object,
        type: "POST",
        url: "controllers/guardar_boleto.php", // Ruta al script PHP que procesará los datos
        success: function (respons) {
            // Maneja la respuesta del servidor aquí si es necesario
            // Por ejemplo, muestra un mensaje de éxito al usuario
            console.log(respons);
            alert("¡Boleto comprado exitosamente!");
            // Limpia el formulario después de comprar el boleto
            cleanForm();
        },
        error: function (xhr, status, error) {
            // Maneja los errores aquí si es necesario
            console.error(xhr.responsText);
            alert("Hubo un error al comprar el boleto. Por favor, inténtalo de nuevo.");
        }
    });
}


function eliminarVenta(asiento) {
    var confirmacion = confirm("¿Estás seguro de que quieres eliminar esta venta?");
    if (confirmacion) {
        $.ajax({
            data: {asiento: asiento},
            type: "POST",
            url: "controllers/eliminar_venta.php", // Ruta al script PHP que eliminará la venta
            success: function (response) {
                console.log(response);
                alert("¡Venta eliminada correctamente!");
                // Realiza alguna acción adicional si es necesario después de eliminar la venta
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Hubo un error al eliminar la venta. Por favor, inténtalo de nuevo.");
            }
        });
    }
}





// Método para actualizar una venta en la base de datos
function actualizarRegistro() {
    var nombre = $("#_inp_name").val();
    var apellidos = $("#_inp_first_name").val();
    var destino = $("#_inp_destiny").val();
    var origen = $("#_inp_origin").val();
    var precio = $("#_inp_cost").val();
    var asiento = $("#_inp_number").val(); // No estoy seguro si esto es correcto, revisa tu HTML

    var datos = {
        nombre: nombre,
        apellidos: apellidos,
        destino: destino,
        origen: origen,
        precio: precio,
        asiento: asiento
    };

    // Enviar los datos al servidor
    $.ajax({
        type: "POST",
        url: "controllers/actualizar_registro.php",
        data: datos,
        success: function(response) {
            // Manejar la respuesta del servidor, si es necesario
            console.log(response);
            alert("Registro actualizado exitosamente");
        },
        error: function(xhr, status, error) {
            // Manejar los errores, si es necesario
            console.error(xhr.responseText);
            alert("Hubo un error al actualizar el registro. Por favor, inténtalo de nuevo.");
        }
    });
}




