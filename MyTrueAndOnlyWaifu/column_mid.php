<div class="w3-col m9">
    <div class="w3-row-padding">
        <div class="w3-col m12">
            <div class="w3-card w3-round w3-white">
                <div class="w3-container w3-padding">
                    <h6 class="w3-opacity">Status</h6>
                    <form method="POST" name="post" action="../postar.php">
                        <textarea name="postar" class="w3-border w3-padding" placeholder="O que está sentindo hoje?"
                                  style="width:100%; background-color: #e7ebee; resize: none"></textarea>
                        <h8 class="w3-opacity">Imagem:</h8>
                        <br>
                        <input type="text" name="img" class="w3-border w3-padding"
                               style=" width:100%; background-color: #e7ebee" placeholder="URL Image">
                        <div>
                            <input type="submit" class="w3-button w3-theme" value="Postar">
                            &nbsp;
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Upadate Posts -->
    <?php
    error_reporting(1);
    include_once "../conexao_bd.php";

    $user = $_SESSION["id_usuario"];	

    $sql = "SELECT post.*, log.nome, log.foto  
				FROM post 
				INNER JOIN log ON post.cod_user = log.id 
				INNER JOIN amizade ON (post.cod_user = amizade.id_user OR post.cod_user = amizade.id_friend)
				WHERE amizade.status = 2 
				AND ($user = amizade.id_user OR $user = amizade.id_friend)
			UNION
			SELECT post.*, log.nome, log.foto  
				FROM post 
				INNER JOIN log ON post.cod_user = log.id
				WHERE post.cod_user = $user
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
        $new_date= date("d/m/Y", strtotime($date));
        $apagar = "<a onclick=\"return confirm('Deseja apagar sua postagem?');\" href='../apagar.php?id=$id'><i class=\"fas fa-times\" style='color: black'></i></a>";
        $status = $registro["status"];

        if ($cod_user == $_SESSION["id_usuario"]) {
            $btn_apagar = "<button class='w3-right w3-opacity'>$apagar</button>";
        } else {
            $btn_apagar ="";
        }
        if($status == 2 && $cod_user == $_SESSION["id_usuario"]){

        }
        echo
        "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <img src='$foto' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:58px'>
        $btn_apagar
        <span class='w3-right w3-opacity'>$new_date</span>
        <h4>$nome</h4><br>
        <hr class='w3-clear'>
        <p value=''>$postar</p>
        <div class='w3-row-padding' style='margin:0 -16px'>
            <div class='w3-half'>
            <a class=\"example-image-link\" href=\"$img\"data-lightbox=\"example-+$id\"><img class=\"example-image w3-margin-bottom \"src=\"$img\"alt=\"image-1\" style=\"width:100%\"/></a>
            </div>   
        </div>
        <br>
        <hr class='w3-clear'>
        <a href='../postagem/postagem.php?id=$id' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>  Comment</a><br>
        &nbsp;
        </div>";
    }


    ?>

    <!-- End Middle Column -->
</div>