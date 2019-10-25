<!DOCTYPE html>
<html lang="es">
<?php
include 'header.php';
?>

<body>
    <?php
    if (!isset($_COOKIE['datosPedido'])) {
        echo '<div>
            <label>Error! No hi ha comandes.</label>
        </div>';
    } else {
        $avui = date('d/m/Y', time());
        setcookie('ultimaComanda', $avui);
        
        $datosPedido =json_decode($_COOKIE['datosPedido']);

        if(file_exists('admin/comandes/comanda_'.$avui.'.json')){
            $datosPedidoJson = file_get_contents('admin/comandes/comanda_'.$avui.'.json');
            $arrayPedidosJson = json_decode($datosPedidoJson, true);

            array_push($arrayPedidosJson, $datosPedido);
            file_put_contents('admin/comandes/comanda_'.$avui.'.json',json_encode($arrayPedidosJson));
        }else{
            file_put_contents('admin/comandes/comanda_'.$avui.'.json',json_encode($datosPedido));
        }

        echo '<div>
                <label>Comanda confirmada correctament!</label>
            </div>';
    }
    ?>
    <script>
        // SCRIPT DE PRUEBA PARA COMPROBAR QUE SE LEE LA COOKIE 
        console.log(readCookie("datosPedido"));

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
    </script>
</body>
<?php
include 'footer.php';
?>

</html>