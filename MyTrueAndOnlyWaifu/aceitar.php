<?php
if ($_GET != NULL){
    include_once "conexao_bd.php";

    $id = $_GET["id"];

    $sql = "UPDATE amizade
            SET status = '2'
            WHERE id = $id";

    $return = $conexao->query($sql);

    if ($return == true) {

        echo "<script>
                alert('Amigo adicionado.');
                location.href='feed/feed.php';
              </script>";

    } else {

        echo "<script>
                alert('Erro ao adicionar');
              </script>";

        echo $conexao->error;

    }

}
else{
        echo "O ID não foi passado! <br>";
}

?>