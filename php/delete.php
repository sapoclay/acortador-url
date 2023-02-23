<?php
    require_once "config.php";
    header("Cache-Control: no-cache, must-revalidate");
    $deleted = false;

    if(isset($_GET['id'])){
        $delete_id = mysqli_real_escape_string($conn, $_GET['id']);
        $stmt = $conn->prepare("DELETE FROM url WHERE shorten_url = ?");
        $stmt->bind_param("s", $delete_id);
        $stmt->execute();
        $stmt->close();
        $deleted = true;
    } elseif(isset($_GET['delete']) && $_GET['delete'] == "all"){
        $stmt = $conn->prepare("DELETE FROM url");
        $stmt->execute();
        $stmt->close();
        $deleted = true;
    }

    if($deleted){
        header("Refresh:0; url=../");
    } else {
        echo "No se encontraron registros para eliminar";
    }
?>

