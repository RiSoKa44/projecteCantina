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
        <input type="submit" name="confirmar" value="Confirmar">
      </fieldset>
    </form>

    <div id="mensajeError">

    </div>
  </div>

  <!-- Comprobacions en javaScript -->
  <script>
    
    var botonConfirmar = document.getElementsByName("confirmar");
    

    function validar() {
      let todoCorrecto=true;
      let textoAlerta="";

      let nombre = document.getElementsByName("nombre")[0].value;
      let apellido = document.getElementsByName("apellido")[0].value;
      let mail = document.getElementsByName("correo")[0].value;
      let telefono = document.getElementsByName("telefono")[0].value;

      let listaDeErrores= document.getElementsByName("mensajeError")[0];

      if(telefono.length!=9){
        textoAlerta+="<li>El telèfon es invàlid </li>";
        todoCorrecto=false;
      }
      if(!mail.includes("@inspedralbes.cat")){
        textoAlerta+="<li>Correu invàlid </li>";
        todoCorrecto=false;
      }
      if (nombre=="" || nombre==undefined || nombre==" "){
        textoAlerta+="<li>El camp nom no pot estar buit</li>";
        todoCorrecto=false;
      }
      if(mail=="" || mail==undefined || mail==" "){
        textoAlerta+="<li>El camp de correu no pot estar buit</li>";
        todoCorrecto=false;
      }
      if(telefono=="" || telefono==undefined || telefono==" "){
        textoAlerta+="<li>El camp de telèfon no pot estar buit</li>";
        todoCorrecto=false;
      }

      if(todoCorrecto){
        let lista=document.createElement("UL");
        let textoDeLista=document.createTextNode(textoAlerta);
        
        lista.appendChild(textoDeLista);
        document.getElementById("mensajeDeError").appendChild(lista);
        document.getElementById("mensajeDeError").style.display="compact";
      }
      else{
        document.getElementById("mensajeDeError").style.display="none";
      }
      
      
    }
    

  </script>
</body>
<?php
    include 'footer.php';
?>
</html>