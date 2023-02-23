<?php 
/*  1. Pega la URL de tu sitio web con una barra diagonal (/) al final de la variable de dominio, no necesitas
       escribir https://wwww. antes del nombre de dominio si tiene configurada la redirección de dominio
    2. Cambia los valores de usuario, pass y db en consecuencia mencionados en los comentarios a continuación
    3. Será necesario dirigirte al archivo JavaScript y buscar allí el dominio. Después pega tu URL allí
    4. Después de todos los cambios, debes esperar y limpiar la caché, porque los cambios guardados en el archivo javascript pueden tardar en reflejarse */

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
