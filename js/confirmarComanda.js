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
        document.getElementById("mensajeError").style.display = "none";
        //Crear objeto usuario
        let usuarioObj={
                "mail": mail,
                "nombre":nombre,
                "apellido":apellido,
                "telefono":telefono,
        };

        //Unir a usuarioObj sus pedidos
        //Guardar cookie con todos los datos completos del pedido
        document.cookie = "datosPedido="+unirPedidoAUsuario(usuarioObj);
        //Cambiar de página
        location.href = "finComanda.php";
    }
    else {
        textoAlerta += "</ul>";
        document.getElementById("mensajeError").innerHTML = textoAlerta;
        document.getElementById("mensajeError").style.display = "compact";
    }

}

//Leer la cookie y devolver su valor
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0){
            return c.substring(nameEQ.length,c.length);
        } 
    }
    return null;
}


//Función que coge el objeto de usuruario, recoge los datos del pedido con las cookies y los junta
function unirPedidoAUsuario(usuarioObj){
    //Variable de texto que guarda un formato JSON
    let usuarioJSON='"'+usuarioObj["mail"]+'":{"nombre":"'+usuarioObj["nombre"]+'","apellido":"'+usuarioObj["apellido"]+'","telefono":'+usuarioObj["telefono"]+',"pedido":[';
    //Leer la cookie de pedidos y la une a la variable de texto JSON
    usuarioJSON+=readCookie("pedidos")+"]}";
    //Devuelve el texto en formato JSON
    return usuarioJSON;

}

