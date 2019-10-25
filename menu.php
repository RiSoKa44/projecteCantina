<!DOCTYPE html>
<html>
<?php
    include 'header.php';
?>
<body>
    <div id="capsulaDiv" >
    <div class="gridGeneral">
        <div class="gridListaItem">
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
                        <select class="myHtmlSelectBox" name="my_HtmlSelectBox">
                            <option class="optionSel" selected="yes">1</option>
                            <option class="optionSel">2</option>
                            <option class="optionSel">3</option>
                            <option class="optionSel">4</option>
                            <option class="optionSel">5</option>                    
                        </select></div>
                        <div class="grid-item itemDinero">'.str_replace('.',',',$elemento[2]).' €</div>
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
        <div class="gridListaItem">
        <div class="cestaImpostor">
        <h2 class="listaCompra">Cesta de la compra</h2>
            <ul>
                <li class="list-group-item mx-4">
                    Bocata de Jamón
                    <button class="btnCarrito" X > - </button>
                    3
                    <button class="btnCarrito" X > + </button>
                </li>
            </ul>   
        </div>
        </div>
    </div>
    <?php 
        echo '<button class="btnMenu" type="button" onclick="location.href=\'confirmarComanda.php\'">Ir a pagar</button>';
    ?>
</body>
<?php
    include 'footer.php';
?>
</html>