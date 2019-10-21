<!DOCTYPE html>
<html>
<?php
    include 'header.php';
?>
<body>
    <h1>Confirmació de comanda</h1>

    <?php 
      #$listaProductos = $_POST['listaProductos'];
      $listaProductos=['Bocadillo de Chope'=>array(2,1.20,2.40)];
      $textoHTML="<div> <table><thead><tr><th>Producte</th><th>Quantitat</th><th>Preu Unitari</th><th>Preu Total</th></tr></thead>";
      $precioTotal=0;
      for ($i=0; $i < count($listaProductos) ; $i++) { 
          $producto= current($listaProductos);
          $textoHTML.="<tr>";
          $textoHTML.="<td>".key($listaProductos)."</td><td>".$producto[0]."</td><td>".$producto[1]."</td><td>".$producto[2]."</td>";
          $precioTotal+=$producto[2];
          $textoHTML.="</tr>";
          next($listaProductos);
        }

    $textoHTML.="</table>";
    $textoHTML.="<p>El preu Total es : ".$precioTotal."</p><br></div>";
    echo $textoHTML;
    ?>

  <div>
    <form action="finComanda.php">
      <fieldset>
       <legend>Informació de l'usuari:</legend>
        Nom :<br>
        <input type="text" name="nombre" ><br>
        Cognom:<br>
        <input type="text" name="apellido"><br>
        Telèfon : <br>
        <input type="tel"  name="telefono"><br>
        Correu : <br>
        <input type="email" name="correo"><br><br>
        <input type="button" name="confirmar" value="Confirmar">
      </fieldset>
    </form>

    <div id="mensajeError">
        <p id="mensaje"> </p>
    </div>
  </div>

  <!-- Comprobacions en javaScript -->
  <script>
    
    var botonConfirmar = document.getElementsByName("confirmar");
    

    function validar() {
      let todoCorrecto=false;
      let textoAlerta="";

      let nombre = document.getElementsByName("nombre");
      let apellido = document.getElementsByName("apellido");
      let mail = document.getElementsByName("correo");
      let telefono = document.getElementsByName("telefono");

      if(telefono.length!=9){
        textoAlerta+="El telèfon es invàlid ";
      }
      if(!mail.includes("@inspedralbes.cat")){
        textoAlerta+="Correu invàlid ";
      }
      if (nombre=="" || apellido){

      }
    }
    

  </script>
</body>
<?php
    include 'footer.php';
?>
</html>