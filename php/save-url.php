<?php
    include "config.php";
    $og_url = $_POST['shorten_url'];
    $shorten_url = str_replace(' ', '', $og_url);
    $hidden_url = $_POST['hidden_url'];

    if(isset($shorten_url) && !empty($shorten_url)){
        if(preg_match("/\//i", $shorten_url)){
            $explodeURL = explode('/', $shorten_url);
            $shortURL = end($explodeURL);
            if($shortURL != ""){
                $stmt = $conn->prepare("SELECT shorten_url FROM url WHERE shorten_url = ? AND shorten_url != ?");
                $stmt->bind_param("ss", $shortURL, $hidden_url);
                $stmt->execute();
                $stmt->bind_result($result);
                $stmt->fetch();
                $stmt->close();
                if(!$result){
                    $stmt2 = $conn->prepare("UPDATE url SET shorten_url = ? WHERE shorten_url = ?");
                    $stmt2->bind_param("ss", $shortURL, $hidden_url);
                    $stmt2->execute();
                    $stmt2->close();
                    echo "success";
                }else{
                    echo "La URL corta que has escrito ya existe. Introduce otra!";
                }
            }else{
                echo "Requerido!! - Es necesario escribir una URL corta!";
            }
        }else{
            echo "URL inválida - No puedes editar el nombre de dominio!";
        }
    }else{
        echo "Requerido!! - Es necesario escribir una URL corta!";
    }
?>