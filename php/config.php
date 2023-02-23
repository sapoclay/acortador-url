<?php 
/* si está trabajando en localhost, entonces no necesita cambiar nada
       pero si está pensando en subirlo al servidor en vivo, entonces tiene que editar algo
    1. Pegue la URL de su sitio web con una barra diagonal (/) en la variable de dominio, no necesita
       para escribir https://wwww. antes del nombre de dominio si tiene configurada la redirección de dominio
    2. Cambie los valores de usuario, pase, db en consecuencia mencionados en los comentarios a continuación
    3. Vaya al archivo JavaScript y busque esta palabra clave - dejar dominio - luego pegue su URL allí
    4. Después de todos los cambios, debe esperar porque los cambios guardados en el archivo javascript pueden tardar en reflejarse */

    $domain = "localhost/url/"; // entreunosyceros.net/
    $host = "localhost";
    $user = "XXXXX"; // Nombre de usuario de la base de datosDatabase username
    $pass = "XXXXX"; // Password de la base de datos
    $db = "XXXXX"; // Nombre de la base de datos

    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){
        echo "Error de conexión a la base de datos: ".mysqli_connect_error();
    }
?>
