<!DOCTYPE html>
<html lang="es">

<?php
    include 'header.php';
?>

<body>
<div class="general">
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img class="imgCab" src="img/puertabuena.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="descFoto">Cantina Pedralbes</h3>
          <p class="underFoto">Av. d'Esplugues, 40</p>
        </div>
      </div>

      <div class="item">
        <img class="imgCab" src="img/zonabuena.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="descFoto">Cantina Pedralbes</h3>
          <p class="underFoto">Av. d'Esplugues, 40</p>
        </div>
      </div>
    
      <div class="item">
        <img class="imgCab" src="img/panoramic.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3 class="descFoto">Cantina Pedralbes</h3>
          <p class="underFoto">Av. d'Esplugues, 40</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div>
    <?php
        $avui = date('d-m-Y', time());
        $ruta;
        if(isset($_COOKIE['ultimaComanda']) && $_COOKIE['ultimaComanda'] == $avui){
            $ruta = 'error.php';
        }else{
            $ruta = 'menu.php';
        }
        echo '<button class="btnLand" onclick="location.href=\'admin\'">Accés administador</button>';
        echo '<button class="btnLand" onclick="location.href=\''.$ruta.'\'">Accés usuari</button>';
    ?>
    
</div>
</body>

<?php
    include 'footer.php';
?>

</html>