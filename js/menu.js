var ara = new Date();
var hores = ara.getHours();
var minuts = ara.getMinutes();
if (hores < 11 || (hores == 11 && minuts < 30)) {
    document.getElementById("menuDinar").className += " oculto";
} else {
    document.getElementById("menuPati").className += " oculto";
}

var arrayPedidos = new Map();
var idPedidos = [];

function addCesta(id, nombre, preu) {
    var cantidad;
    if (hores < 11 || (hores == 11 && minuts < 30)) {
        cantidad = +document.getElementById("selectMenuPati" + id).value;
    } else {
        cantidad = +document.getElementById("selectMenuDinar" + id).value;
    }

    if (arrayPedidos.has(nombre)) {
        var cantidadMap = arrayPedidos.get(nombre)[0];
        arrayPedidos.set(nombre, [cantidadMap + cantidad, +preu, (cantidadMap+cantidad) * preu]);
    } else {
        arrayPedidos.set(nombre, [+cantidad, +preu, cantidad * preu]);
        idPedidos.push(nombre);
    }

    actualizarCestaCompra();
};

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

function botonMas(idArray){
    var nombre = idPedidos[idArray];
    var cantidadMap = arrayPedidos.get(nombre)[0];
    var preu = arrayPedidos.get(nombre)[1];

    cantidadMap++;
    arrayPedidos.set(nombre, [cantidadMap, +preu, (cantidadMap) * preu]);

    actualizarCestaCompra();
}

function comprar(){
    if(arrayPedidos.size == 0){
    swal ( "Oops" ,  "La seva cistella esta buida" ,  "error" )
    }else{
        document.cookie = "pedidos="+JSON.stringify((mapToObj()));
        location.href = 'confirmarComanda.php';
    }
};

function mapToObj() {
    let obj = {};

    arrayPedidos.forEach(function(value, key){
        obj[key] = value
    });

    return obj;
};