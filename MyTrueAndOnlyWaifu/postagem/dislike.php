<?php
include_once "../conexao_bd.php";
$cod_post = $_GET["id_post"];
$id_like = $_GET["id_like"];

if ($cod_post != NULL) {

    $sql = "DELETE FROM like_post WHERE id = $id_like";
    $return = $conexao->query($sql);
    if ($return == true) {
        echo "<script>
                alert('Descurtiu');
                location.href = 'postagem.php?id=$cod_post';
              </script>";
    } else {
        echo "<script>
                alert('Erro');
              </script>";
    }
}


?>
