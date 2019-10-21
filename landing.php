<!DOCTYPE html>
<html lang="es">
<?php
    include 'header.php';
?>
<body>
    <?php
    $avui = date('d/m/Y', time());
    $ruta;
    if(isset($_COOKIE['ultimaComanda']) && $_COOKIE['ultimaComanda'] == $avui){
        $ruta = 'error.php';
    }else{
        $ruta = 'menu.php';
    }

    echo '
        <h4>Av. d\'Esplugues, 40</h4>
        <div>
            <button onclick="location.href=\''.$ruta.'\'">Avançar</button>
        </div>';

    ?>
</body>
<?php
    include 'footer.php';
?>
</html>