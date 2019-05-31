<?php

if ($_POST != NULL) {
    error_reporting(1);

    include_once "../conexao_bd.php";

    $comentar = $_POST["comentario"];
    $id_post = $_GET["id"];
    $id_user = $_GET["cod_user"];
    $comentar = "INSERT INTO comment (comentario, id_post, id_user) 
                                    VALUES ('$comentar', '$id_post','$id_user')";

    $ret = $conexao->query($comentar);

    if ($ret == true) {

        echo "<script>
               alert('postar concluida!');
               location.href = '/postagem/postagem.php';
              </script>";

    } else {

        echo "<script>
               alert('Erro ao Postar!');
              </script>";
        echo $conexao->error;
    }

}

?>