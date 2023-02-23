<?php 
  require_once "php/config.php";
  header("Cache-Control: no-cache, must-revalidate");
  require_once "inc/redireccion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acortador de URL con PHP</title>
  <link rel="icon" type="image/jpg" href="img/favicon.ico"/>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
</head>
<body>
  <div class="wrapper">
  <div class="titulo" title="made in entreunosyceros.net">Acortador de URL</div>
    <form action="#" autocomplete="off">
      <input type="text" spellcheck="false" name="full_url" placeholder="Escribe la URL larga aquí (https://...)" required>
      <i class="url-icon uil uil-link"></i>
      <button>Acortar</button>
    </form>
    <?php 
      require_once "inc/listado.php";
    ?>
  </div>

  <div class="blur-effect"></div>
  <div class="popup-box">
    <div class="info-box">Tu URL acortada está lista.</div>
    <form action="#" autocomplete="off">
      <label>Edita tu URL corta</label>
      <input type="text" class="shorten-url" spellcheck="false" required>
      <i class="copy-icon uil uil-copy-alt"></i>
      <button>Guardar</button>
    </form>
  </div>

  <script src="script.js"></script>

</body>

</html>
