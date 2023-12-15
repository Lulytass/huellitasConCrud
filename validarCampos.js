// Función para validar el campo de nombre
function validarNombreYApellido() {
    const nombreInput = document.getElementById("nombreRegistro");
    const apellidoInput = document.getElementById("apellidoRegistro");
    const mensajeNombreIncorrecto = document.getElementById("mensajeNombreIncorrecto");
    const nombre = nombreInput.value;
    const apellido = apellidoInput.value;
    const soloLetras = /^[A-Za-z]+$/; // Expresión regular para letras

    if (!nombre.match(soloLetras)) {
        mensajeNombreIncorrecto.style.display = "block";
        nombreInput.value = ""; // Borra el contenido incorrecto
        nombreInput.focus(); // Devuelve el foco al campo de nombre
        return false;
    }else if(!apellido.match(soloLetras)){
        mensajeNombreIncorrecto.style.display = "block";
        apellidoInput.value = ""; // Borra el contenido incorrecto
        apellidoInput.focus(); // Devuelve el foco al campo de apellido
        return false;
    }else{
        mensajeNombreIncorrecto.style.display = "none"; // Oculta el mensaje si el campo es válido
    }
    return true;
}

// Manejar la validación al salir del campo de nombre
document.getElementById("nombreRegistro").addEventListener("blur", validarNombreYApellido);
document.getElementById("apellidoRegistro").addEventListener("blur", validarNombreYApellido);