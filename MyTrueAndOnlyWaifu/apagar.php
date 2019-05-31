<?php
    error_reporting(1);

if ($_GET != NULL){
    include_once "conexao_bd.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM post
            WHERE id = $id";

    $return = $conexao->query($sql);

    if ($return == true) {

        echo "<script>
                alert('Post deletado com sucesso.');
                location.href='feed/feed.php';
              </script>";

    } else {

        echo "<script>
                alert('Erro ao deletar');
              </script>";

        echo $conexao->error;

    }

}
else{
    echo "O ID não foi passado! <br>";
}
?>