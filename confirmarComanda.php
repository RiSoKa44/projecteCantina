<!DOCTYPE html>
<html>
<head>
    <?php include(header.php); ?>
</head>
<body>
    <form action="confirmarComanda.php">
        <fieldset>
          <legend>Informació de l'usuari:</legend>
          Nom :<br>
          <input type="text" name="nombre" ><br>
          Cognom:<br>
          <input type="text" name="apellido"><br>
          Telèfon : <br>
          <input type="number" min="9" max="9" name="telefono"><br>
          Correu : <br>
          <input type="email" name="correo"><br><br>
          <input type="submit" value="Confirmar">
        </fieldset>
      </form>
      
    <?php include(footer.php); ?>
</body>

</html>