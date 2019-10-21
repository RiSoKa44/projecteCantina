<!DOCTYPE html>
<html lang="es">

<body>
    <?php
    $avui = date('d/m/Y', time());
    setcookie('ultimaComanda', $avui);
    //$pedidos = $_POST['listaProductos'];

    //if(file_exists('comandas/'.$avui.'.json')){
        //$pedidosJson = file_get_contents('comandas/'.$avui.'.json');
        //$arrayPedidosJson = json_decode($pedidosJson, true);

        //array_push($arrayPedidosJson, $pedidos);
        //file_put_contents('comandas/'.$avui.'.json',json_encode($arrayPedidosJson));
    //}else{
        //file_put_contents('comandas/'.$avui.'.json',json_encode($pedidos));
    //}
    

    

    echo '<div>
            <label>Comanda confirmada correctament!</label>
        </div>';

    ?>
</body>

</html>