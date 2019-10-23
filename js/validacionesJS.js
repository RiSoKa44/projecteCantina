
// Validaciones del formulario
function validarFormulario() {
    let todoCorrecto = true;
    let textoAlerta = "<ul>";

    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let mail = document.getElementById("correo").value;
    let telefono = document.getElementById("telefono").value;


    let listaDeErrores = document.getElementById("mensajeError");
    //Longitud del teléfono
    if (telefono.length != 9) {
        textoAlerta += "<li>El format del telèfon no és vàlid </li>";
        todoCorrecto = false;
    }
    //Dominio correcto
    if (!mail.includes("@inspedralbes.cat")) {
        textoAlerta += "<li>Aquest correu no és vàlid </li>";
        todoCorrecto = false;
    }

    //Comprobar que el telefono contiene letras
    if (telefono != "" && telefono != undefined && telefono != " "){
        let telefonoConCaracteres=false;
        for(i=0; i<telefono.length; i++){
            if (!/^([0-9])*$/.test(telefono.charAt(i))){
                telefonoConCaracteres=true;
            }
         }
         if(telefonoConCaracteres){
            textoAlerta += "<li>El número de telèfon no és vàlid </li>";
            todoCorrecto = false;
         }
         
    }
    //Saber si los campos están vacíos
    if (nombre == "" || nombre == undefined || nombre == " ") {
        textoAlerta += "<li>El camp nom no pot estar buit</li>";
        todoCorrecto = false;
    }
    if (mail == "" || mail == undefined || mail == " ") {
        textoAlerta += "<li>El camp de correu no pot estar buit</li>";
        todoCorrecto = false;
    }
    if (telefono == "" || telefono == undefined || telefono == " ") {
        textoAlerta += "<li>El camp de telèfon no pot estar buit</li>";
        todoCorrecto = false;
    }

    if (todoCorrecto) {
        // textoAlerta="";
        document.getElementById("mensajeError").style.display = "none";
        //Cambiar de página
        window.location.href = "finComanda.php";
    }
    else {
        textoAlerta += "</ul>";
        document.getElementById("mensajeError").innerHTML = textoAlerta;
        document.getElementById("mensajeError").style.display = "compact";
    }

}