<!DOCTYPE html>
<html>
<?php
    include 'header.php';
?>
<body>
    <div id="capsulaDiv" >
        <?php
            $menuPati = [
                ['Bocata jamón','imgBocata.jpg', 2.00]
            ];
            $menuDinar = [
                ['Bocata chorizo','imgBocata.jpg', 3.59]
            ];

            echo '<div id="menuPati">';
            for ($i=0; $i < sizeof($menuPati); $i++) { 
                $elemento = $menuPati[$i];
                echo '<div class="grid-container">
                        <div class="grid-item item1"><img class="imgProd" src="img/'.$elemento[1].'"></div>
                        <div class="grid-item item2 nmbtxt">'.$elemento[0].'</div>
                        <div class="grid-item">PHPUNIDADES</div>
                        <div class="grid-item">'.str_replace('.',',',$elemento[2]).' €</div>
                        <div class="grid-item item2">
                            <button class="addCesta" type="button" onclick="addCesta(\''.$elemento[0].'\',\''.$elemento[1].'\', \''.$elemento[2].'\')">Añadir a la cesta</button>
                        </div>  
                    </div>';
            }
            echo '</div>';

            echo '<div id="menuDinar">';
            for ($i=0; $i < sizeof($menuDinar); $i++) { 
                $elemento = $menuDinar[$i];
                echo '<div class="grid-container">
                        <div class="grid-item item1"><img class="imgProd" src="img/'.$elemento[1].'"></div>
                        <div class="grid-item item2">'.$elemento[0].'</div>
                        <div class="grid-item">PHPUNIDADES</div>
                        <div class="grid-item">'.str_replace('.',',',$elemento[2]).' €</div>
                        <div class="grid-item item2">
                            <button class="addCesta" type="button" onclick="addCesta(\''.$elemento[0].'\',\''.$elemento[1].'\', \''.$elemento[2].'\')">Añadir a la cesta</button>
                        </div>  
                    </div>';
            }
            echo '</div>';
        ?>
    </div>
    <?php 
        echo '<button class="btnMenu" type="button" onclick="location.href=\'confirmarComanda.php\'">Mirar carro y comprar</button>';
    ?>
</body>
<?php
    include 'footer.php';
?>
</html>