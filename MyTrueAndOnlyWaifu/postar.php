<?php
error_reporting(1);
if ($_POST != NULL) {

    include_once "conexao_bd.php";

    session_start();

    $postar = $_POST["postar"];
    $img = $_POST["img"];
    $cod_user = $_SESSION["id_usuario"];
    $date = date('Y-m-d');

    $post = "INSERT INTO post (postar, img, cod_user, data_post)
             VALUES ('$postar', '$img', '$cod_user', '$date')";

    $return = $conexao->query($post);

    if ($return == true) {

        echo "<script>
                alert('Postagem concluida!');
                location.href = 'feed/feed.php';
              </script>";

    } else {

        echo "<script>
                alert('Erro ao Postar!');
              </script>";
        echo $conexao->error;
    }

}
?>

