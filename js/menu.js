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
        var cantidadMap = arrayPedidos.get(nombre)[0];
        arrayPedidos.set(nombre, [cantidadMap + cantidad, +preu, (cantidadMap+cantidad) * preu]);
    } else {
        arrayPedidos.set(nombre, [+cantidad, +preu, cantidad * preu]);
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
                        '<button class="btnCarrito" > - </button>'+
                        '<label class="fontNormal">'+valor[0]+'</label>'+
                        '<button class="btnCarrito"> + </button>';
        listaCompra.appendChild(li);
    });
}

function comprar(){
    if(arrayPedidos.size == 0){
        alert('La seva cistella està buida');
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