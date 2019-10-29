var ara = new Date();
var hores = ara.getHours();
var minuts = ara.getMinutes();
/** Oculta una lista de productos dependiendo de la hora */
if (hores < 11 || (hores == 11 && minuts < 30)) {
    document.getElementById("menuDinar").className += " oculto";
} else {
    document.getElementById("menuPati").className += " oculto";
}
/** arrayPedidos será nuestra base de datos de los pedidos hechos */
var arrayPedidos = new Map();
/** Variable con las id's de cada producto hecho */
var idPedidos = [];

/** Función para añadir un producto al Map arrayPedidos y actualizar la cesta de la compra */
function addCesta(id, nombre, preu) {
    var cantidad;
    if (hores < 11 || (hores == 11 && minuts < 30)) {
        cantidad = +document.getElementById("selectMenuPati" + id).value;
    } else {
        cantidad = +document.getElementById("selectMenuDinar" + id).value;
    }

    if (arrayPedidos.has(nombre)) {
        /** Modifica arrayPedidos añadiéndole cantidad */
        var cantidadMap = arrayPedidos.get(nombre)[0];
        arrayPedidos.set(nombre, [cantidadMap + cantidad, +preu, (cantidadMap+cantidad) * preu]);
    } else {
        /** Añade el producto a la lista de pedidos */
        arrayPedidos.set(nombre, [+cantidad, +preu, cantidad * preu]);
        /** Añade un producto al array idPedidos */
        idPedidos.push(nombre);
    }

    actualizarCestaCompra();
};
/** Función que printea la lista de productos en la página web */
function actualizarCestaCompra(){
    var listaCompra = document.getElementById("listaCompra");
    listaCompra.innerHTML = '';
    arrayPedidos.forEach(function(valor, clave){
        var li = document.createElement("li");
        li.className = 'list-group-item mx-4';
        li.innerHTML = '<label class="fontNormal">'+clave+'</label>'+
                        '<button class="btnCarrito" onclick="botonMenos('+idPedidos.indexOf(clave)+')"> - </button>'+
                        '<label class="fontNormal">'+valor[0]+'</label>'+
                        '<button class="btnCarrito" onclick="botonMas('+idPedidos.indexOf(clave)+')"> + </button>';
        listaCompra.appendChild(li);
    });
}
/** Función para restar un producto en la cesta de la compra */
function botonMenos(idArray){
    var nombre = idPedidos[idArray];
    var cantidadMap = arrayPedidos.get(nombre)[0];
    var preu = arrayPedidos.get(nombre)[1];
    
    cantidadMap--;
    if(cantidadMap == 0){
        arrayPedidos.delete(nombre);
    }else{
        arrayPedidos.set(nombre, [cantidadMap, +preu, (cantidadMap) * preu]);
    }

    actualizarCestaCompra();
}
/** Función para sumar un producto en la cesta de la compra */
function botonMas(idArray){
    var nombre = idPedidos[idArray];
    var cantidadMap = arrayPedidos.get(nombre)[0];
    var preu = arrayPedidos.get(nombre)[1];

    cantidadMap++;
    arrayPedidos.set(nombre, [cantidadMap, +preu, (cantidadMap) * preu]);

    actualizarCestaCompra();
}
/** Función onClick del botón comprar */
function comprar(){
    if(arrayPedidos.size == 0){
    swal ( "Oops" ,  "La seva cistella esta buida" ,  "error" );
    }else{
        document.cookie = "pedidos="+JSON.stringify((mapToObj()));
        location.href = 'confirmarComanda.php';
    }
};
/** Función auxiliar para transformar el map arrayPedidos en JSON */
function mapToObj() {
    let obj = {};

    arrayPedidos.forEach(function(value, key){
        obj[key] = value
    });

    return obj;
};