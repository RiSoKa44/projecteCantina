<!DOCTYPE html>
<html lang="es">
<?php
include 'header.php';
?>

<body>
    <?php
    if (!isset($_POST['listaProductos'])) {
        echo '<div>
            <label>Error! No hi ha comandes.</label>
        </div>';
    } else {
        $avui = date('d/m/Y', time());
        setcookie('ultimaComanda', $avui);
        //$pedidos = $_POST['listaProductos'];

        //if(file_exists('comandes/'.$avui.'.json')){
        //$pedidosJson = file_get_contents('comandes/'.$avui.'.json');
        //$arrayPedidosJson = json_decode($pedidosJson, true);

        //array_push($arrayPedidosJson, $pedidos);
        //file_put_contents('comandes/'.$avui.'.json',json_encode($arrayPedidosJson));
        //}else{
        //file_put_contents('comandes/'.$avui.'.json',json_encode($pedidos));
        //}

        echo '<div>
                <label>Comanda confirmada correctament!</label>
            </div>';
    }
    ?>
</body>
<?php
include 'footer.php';
?>

</html>