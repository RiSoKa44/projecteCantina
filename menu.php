<!DOCTYPE html>
<html>
<?php
include 'header.php';
?>

<body>
    <div id="capsulaDiv">
        <div class="gridGeneral">
            <div class="gridListaItem">
                <?php
                $menuPati = [
                    ['BOCATA DE JAMÓN', 'imgBocata.jpg', 2.00]
                ];
                $menuDinar = [
                    ['Bocata chorizo', 'imgBocata.jpg', 3.59]
                ];

                echo '<div id="menuPati">';
                for ($i = 0; $i < sizeof($menuPati); $i++) {
                    $elemento = $menuPati[$i];
                    echo '<div class="grid-container">
                        <div class="grid-item item1"><img class="imgProd" src="img/' . $elemento[1] . '"></div>
                        <div class="grid-item item2 nmbtxt">' . $elemento[0] . '</div>
                        <div class="grid-item">
                        <select class="myHtmlSelectBox" id="selectMenuPati' . $i . '">
                            <option class="optionSel" selected="yes" value="1">1</option>
                            <option class="optionSel" value="2">2</option>
                            <option class="optionSel" value="3">3</option>
                            <option class="optionSel" value="4">4</option>
                            <option class="optionSel" value="5">5</option>
                        </select></div>
                        <div class="grid-item itemDinero">' . str_replace('.', ',', $elemento[2]) . ' €</div>
                        <div class="grid-item item2">
                            <button class="addCesta" type="button" onclick="addCesta(\'' . $i . '\',\'' . $elemento[0] . '\', \'' . $elemento[2] . '\')">Añadir a la cesta</button>
                        </div>  
                    </div>';
                }
                echo '</div>';

                echo '<div id="menuDinar">';
                for ($i = 0; $i < sizeof($menuDinar); $i++) {
                    $elemento = $menuDinar[$i];
                    echo '<div class="grid-container">
                        <div class="grid-item item1"><img class="imgProd" src="img/' . $elemento[1] . '"></div>
                        <div class="grid-item item2 nmbtxt">' . $elemento[0] . '</div>
                        <div class="grid-item">
                        <select class="myHtmlSelectBox" id="selectMenuDinar' . $i . '">
                            <option selected="yes" value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>                    
                        </select></div>
                        <div class="grid-item">' . str_replace('.', ',', $elemento[2]) . ' €</div>
                        <div class="grid-item item2">
                            <button class="addCesta" type="button" onclick="addCesta(\'' . $i . '\',\'' . $elemento[0] . '\', \'' . $elemento[2] . '\')">Añadir a la cesta</button>
                        </div>  
                    </div>';
                }
                echo '</div>';
                ?>
            </div>
            <div class="gridListaItem">
                <div class="cestaImpostor">
                    <h2 class="listaCompra">Cesta de la compra</h2>
                    <ul id="listaCompra">
                        <li class="list-group-item mx-4">
                            <label class="fontNormal">Bocata de Jamón</label>
                            <button class="btnCarrito" > - </button>
                            <label class="fontNormal" id="">3</label>
                            <button class="btnCarrito"> + </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        echo '<button class="btnMenu" type="button" onclick="comprar()">Ir a pagar</button>';
        ?>

        <script type="text/javascript" src="js/menu.js"></script>
</body>
<?php
include 'footer.php';
?>

</html>