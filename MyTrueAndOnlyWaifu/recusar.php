<?php
if ($_GET != NULL){
    include_once "conexao_bd.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM amizade
            WHERE id = $id";

    $return = $conexao->query($sql);

    if ($return == true) {

        echo "<script>
                alert('Solicitação recusada.');
                location.href='feed/feed.php';
              </script>";

    } else {

        echo "<script>
                alert('Erro ao recusar');
              </script>";

        echo $conexao->error;

    }

}
else{
    echo "O ID não foi passado! <br>";
}

?>