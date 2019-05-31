<?php
include_once "../conexao_bd.php";
session_start();

$cod_user = $_SESSION["id_usuario"];
$cod_post = $_GET["id_post"];
$status = 1;

if ($cod_post != NULL) {

    $sql = "INSERT INTO like_post (cod_user, cod_post, status) 
                  VALUES ('$cod_user', '$cod_post','$status')";
    $return = $conexao->query($sql);
    if ($return == true) {
        echo "<script>
                alert('Curtiu');
                location.href = 'postagem.php?id=$cod_post';
              </script>";
    } else {
        echo "<script>
                alert('Erro');
              </script>";
    }
}


?>