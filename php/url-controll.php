<?php
    include "config.php";
    $full_url = $_POST['full_url'];
    if(!empty($full_url) && filter_var($full_url, FILTER_VALIDATE_URL)){
        $ran_url = substr(md5(microtime()), rand(0, 26), 5);
        $stmt = $conn->prepare("SELECT shorten_url FROM url WHERE shorten_url = ?");
        $stmt->bind_param("s", $ran_url);
        $stmt->execute();
        $stmt->bind_result($shorten_url);
        $stmt->fetch();
        if(empty($shorten_url)){
            $stmt->close();
            $stmt2 = $conn->prepare("INSERT INTO url (full_url, shorten_url, clicks) VALUES (?, ?, '0')");
            $stmt2->bind_param("ss", $full_url, $ran_url);
            if($stmt2->execute()){
                $stmt2->close();
                echo $ran_url;
            }else{
                echo "Algo ha salido mal. Vuelve a intentarlo!";
            }
        }else{
            echo "Algo ha salido mal. Vuelve a regenerar la URL!";
        }
    }else{
        echo "$full_url - Esto no es una URL válida (es necesario utilizar https:...!";
    }
?>