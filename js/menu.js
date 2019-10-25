var ara = new Date();
var hores = ara.getHours();
var minuts = ara.getMinutes();
if (hores < 11 || (hores == 11 && minuts < 30)) {
    document.getElementById("menuDinar").className += " oculto";
} else {
    document.getElementById("menuPati").className += " oculto";
}

var arrayPedidos = new Map();

function addCesta(id, nombre, preu) {
    var cantidad;
    if (hores < 11 || (hores == 11 && minuts < 30)) {
        cantidad = +document.getElementById("selectMenuPati" + id).value;
    } else {
        cantidad = +document.getElementById("selectMenuDinar" + id).value;
    }

    if (arrayPedidos.has(nombre)) {
        var cantidadMap = arrayPedidos.get(nombre)[1];
        arrayPedidos.set(nombre, [preu, cantidadMap + cantidad]);
    } else {
        arrayPedidos.set(nombre, [preu, +cantidad]);
    }
    printKeys(arrayPedidos);
};

function comprar(){
    if(arrayPedidos.size == 0){
        alert('La seva cistella està buida');
    }else{
        
    }
}