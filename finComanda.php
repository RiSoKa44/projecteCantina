<!DOCTYPE html>
<html lang="es">
<?php
include 'header.php';
?>

<body>
    <?php
    #Comprobar que hay pedidos
    if (!isset($_COOKIE['datosPedido'])) {
        echo '<div>
            <label>Error! No hi ha comandes.</label>
        </div>';
    } else {
        #Crear cookie para no poder pedir dos veces en un mismo día
        $avui = date('d-m-Y', time());
        setcookie('ultimaComanda', $avui);

        #Coger la cookie que contiene una string con el pedido
        $datosPedido = $_COOKIE['datosPedido'];

        #Comrpobar si ya se han hecho pedidos hoy y si el fichero existe
        #Si existe, coge los datos del fichero y les une los nuevos datos del usuario con su pedido
        if (file_exists('admin/comandes/comanda_' . $avui . '.json')) {

            #Recoger los datos del fichero en formato texto
            $datosPedidoJson = file_get_contents('admin/comandes/comanda_' . $avui . '.json');
            #Quitar los {} del principio y del final del texto
            $datosPedidoJson = substr($datosPedidoJson, 1, strlen($datosPedidoJson) - 2);
            #Unir datos nuevos a los antiguos
            $datosPedidoJson .= ',' . $datosPedido;
            #Formatar para JSON
            $textoEnJson = "{" . $datosPedidoJson . "}";
            #Añadir al fichero JSON final
            file_put_contents('admin/comandes/comanda_' . $avui . '.json', $textoEnJson);
        } else {
            $textoEnJson = "{" . $datosPedido . "}";
            file_put_contents('admin/comandes/comanda_' . $avui . '.json', $textoEnJson);
        }

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