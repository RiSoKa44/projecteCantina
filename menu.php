<!DOCTYPE html>
<html>
<?php
    include 'header.php';
?>
<body>
    <div id="capsulaDiv" >
        <?php
            $menuPati = [
                ['BOCATA DE JAMÓN','imgBocata.jpg', 2.00]
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
                        <div class="grid-item">
                        <select class="myHtmlSelectBox" id="selectMenuPati'.$i.'">
                            <option selected="yes" value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></div>
                        <div class="grid-item">'.str_replace('.',',',$elemento[2]).' €</div>
                        <div class="grid-item item2">
                            <button class="addCesta" type="button" onclick="addCesta(\''.$i.'\',\''.$elemento[0].'\', \''.$elemento[2].'\')">Añadir a la cesta</button>
                        </div>  
                    </div>';
            }
            echo '</div>';

            echo '<div id="menuDinar">';
            for ($i=0; $i < sizeof($menuDinar); $i++) { 
                $elemento = $menuDinar[$i];
                echo '<div class="grid-container">
                        <div class="grid-item item1"><img class="imgProd" src="img/'.$elemento[1].'"></div>
                        <div class="grid-item item2 nmbtxt">'.$elemento[0].'</div>
                        <div class="grid-item">
                        <select class="myHtmlSelectBox" id="selectMenuDinar'.$i.'">
                            <option selected="yes" value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>                    
                        </select></div>
                        <div class="grid-item">'.str_replace('.',',',$elemento[2]).' €</div>
                        <div class="grid-item item2">
                            <button class="addCesta" type="button" onclick="addCesta(\''.$i.'\',\''.$elemento[0].'\',\''.$elemento[1].'\', \''.$elemento[2].'\')">Añadir a la cesta</button>
                        </div>  
                    </div>';
            }
            echo '</div>';
        ?>
    </div>
    <?php 
        echo '<button class="btnMenu" type="button" onclick="comprar()">Mirar carro y comprar</button>';
    ?>

    <script type="text/javascript" src="js/menu.js"></script>
</body>
<?php
    include 'footer.php';
?>
</html>