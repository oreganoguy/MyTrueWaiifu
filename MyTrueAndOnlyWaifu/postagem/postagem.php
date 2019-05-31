<?php include_once "../layout_top.php"; ?>
<?php include_once "left_column.php" ?>
<div class="w3-col m12">
    <?php
    error_reporting(1);
    include_once "../conexao_bd.php";

    $id_postagem = $_GET['id'];

    $sql = " SELECT post.*, log.nome, log.foto  
                  FROM post
                  INNER JOIN log
                  ON post.cod_user = log.id
                  ORDER BY id DESC";


    $retorno = $conexao->query($sql);

    while ($registro = $retorno->fetch_array()) {
        $id = $registro["id"];
        $cod_user = $registro["cod_user"];
        $nome = $registro["nome"];
        $foto = $registro["foto"];
        $postar = $registro["postar"];
        $img = $registro["img"];
        $date = $registro["data_post"];
        $apagar = "<a onclick=\"return confirm('Deseja apagar sua postagem?');\" href='../apagar.php?id=$id'><i class=\"fas fa-times\" style='color: black'></i></a>";

        if ($cod_user == $_SESSION["id_usuario"]) {
            $btn_apagar = "<button class='w3-right w3-opacity'>$apagar</button>";
        } else {
            $btn_apagar = "";
        }
        if ($id_postagem == $id) {
            echo
            "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <img src='$foto' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:58px'>
        $btn_apagar
        <span class='w3-right w3-opacity'>$date</span>
        <h4>$nome</h4><br>
        <hr class='w3-clear'>
        <p value=''>$postar</p>
        <div class='w3-row-padding' style='margin:0 -16px'>
            <div class='w3-half'>
            <a class='example-image-link' href='$img'data-lightbox='example-+$id'><img class='example-image w3-margin-bottom 'src='$img'alt='image-1' style='width:100%'/></a>
            </div>   
        </div>
       ";
        }
    }
    $like = "SELECT * FROM like_post";
    $retornol = $conexao->query($like);
    $likes = 0;
    while($registry = $retornol->fetch_array()){
        $id_post = $registry['cod_post'];
        $id_user = $registry['cod_user'];
        $id = $registry['id'];
        $status = $registry['status'];
        if ($id_post == $id_postagem){
            $likes = $likes + 1;

        }
        if ($id_user == $_SESSION["id_usuario"] && $id_post == $id_postagem && $status == 1){
            $like_btn = "<a href='dislike.php?id_like=$id&id_post=$id_postagem' type='submit' name='like' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fas fa-thumbs-up' style='color: #F0FF00;'></i></a>";
        }
        else{
            $like_btn = "<a href='like.php?id_post=$id_postagem' type='submit' name='like' class='w3-button w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i></a>";        }
    }
     echo " $like_btn
        <span class='w3-margin-left w3-right w3-opacity'>$likes Curtidas</span><br>
        <hr class='w3-clear'>";
    ?>
    &nbsp;
</div>
</div>
<div class="w3-col m12">
    <div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <span class='w3-margin-left w3-right w3-opacity w3-margin' style="padding-top: ">
            <?php
            include_once "../conexao_bd.php";

            $comentario_sql = "SELECT * FROM comment";
            $retornoc = $conexao->query($comentario_sql);
            $comentarios = 0;

            while($registroc = $retornoc->fetch_array()){
                $id_post = $registroc['id_post'];
                if ($id_post == $id_postagem){
                    $comentarios = $comentarios + 1;
                }
            }
            echo "$comentarios Cometarios"
            ?></span><br>
        <hr class="w3-clear w3-margin">
        <form method="post" action="">
            <textarea name="comentario" class="w3-border w3-padding" placeholder="Comente aqui."
                      style="width:100%; background-color: #e7ebee; resize: none" required></textarea>
            <br>
            <button type='submit' name="comentar" class='w3-button w3-theme-d2 w3-margin-bottom'><i
                        class='fa fa-comment'></i></button>
            <br>
        </form>
        <hr class="w3-clear w3-margin">

        <?php

        if ($_POST != NULL) {
            error_reporting(1);

            include_once "../conexao_bd.php";

            $comentar = $_POST["comentario"];
            $id_post = $_GET["id"];
            $id_user = $_SESSION["id_usuario"];
            $comentar = "INSERT INTO comment (comentario, id_post, id_user) 
                                    VALUES ('$comentar', '$id_post','$id_user')";

            $ret = $conexao->query($comentar);

            if ($ret == true) {

                echo "<script>
               alert('Postagem concluida!');
               location.href = 'postagem.php?id=$id_post';
              </script>";

            } else {

                echo "<script>
               alert('Erro ao Postar!');
              </script>";
                echo $conexao->error;
            }

        }
        $view = "SELECT comment.* ,log.foto, log.nome
                     FROM comment
                     INNER JOIN log
                     ON comment.id_user = log.id ";
        $re = $conexao->query($view);

        while ($regis = $re->fetch_array()) {
            $id = $regis["id"];
            $nome = $regis["nome"];
            $id_post = $regis["id_post"];
            $foto = $regis["foto"];
            $comentario = $regis["comentario"];

            if ($id_post == $id_postagem) {
                echo "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
                    <img src='$foto' alt='Avatar' class='w3-left w3-circle' style='width:60px'>
                    <p value=''>$comentario</p>
                    
                </div>";
            }
        }

        ?>

    </div>
</div>


</div>

<!-- End Page Container -->
</div>
<?php include_once "../layout_footer.php"; ?>
