<div class="w3-col m12">
    <div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <span class='w3-margin-left w3-right w3-opacity w3-margin' style="padding-top: "> Comentarios</span><br>
        <hr class="w3-clear w3-margin">
        <form action="" class="">
            <textarea name="comentario" id="comentario" class cols="50" rows="1" placeholder="Comente aqui."></textarea>
            <button type="submit" value="Enviar" class='w3-button w3-theme-d1 w3-margin-bottom'>Enviar</button>
        </form>
        <hr class="w3-clear w3-margin">
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
               location.href = '/postagem/postagem.php?id=$id_post';
              </script>";

            } else {

                echo "<script>
               alert('Erro ao Postar!');
              </script>";
                echo $conexao->error;
            }

        }

        ?>

    </div>
</div>


</div>

<!-- End Page Container -->
</div>
