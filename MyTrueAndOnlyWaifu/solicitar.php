<?php
include_once "conexao_bd.php";
session_start();

$id_user = $_SESSION["id_usuario"];
$id_friend = $_GET["id"];
if ($id_friend != NULL) {

    $sql = "INSERT INTO amizade (id_user, id_friend) 
                  VALUES ('$id_user', '$id_friend')";

    $return = $conexao->query($sql);


    if ($return == true) {
        echo "<script>
                alert('Solicitação enviada com sucesso!');
                location.href = 'feed/feed.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao enviar a solicitação.');
                location.href = 'feed/feed.php';
              </script>";
    }
}


?>