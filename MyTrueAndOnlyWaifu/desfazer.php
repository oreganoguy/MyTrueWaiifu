<?php
if ($_GET != NULL) {
    include_once "conexao_bd.php";

    session_start();

    $id_user = $_SESSION["id_usuario"];
    $id = $_GET["id"];

    $amizade = "SELECT * 
                FROM amizade
                WHERE (id_friend = $id AND id_user = $id_user) or (id_friend = $id_user AND id_user = $id)";
    $retornar = $conexao->query($amizade);

    if($registro = $retornar->fetch_array()){
        $id_amizade = $registro['id'];
    }


        $sql = "DELETE FROM amizade
            WHERE id = $id_amizade";
        $return = $conexao->query($sql);

        if ($return == true) {
            echo "<script>
                alert('Amizade desfeita.');
                location.href='feed/feed.php';
              </script>";
        }
     else {

         echo "<script>
                alert('Erro ao desfazer amizade');
              </script>";

         echo $conexao->error;
     }


} else {
    echo "O ID não foi passado! <br>";
}

?>