<?php
    $filtro_sql ="";

    if($_POST != NULL){
        $filtro = $_POST["filtro"];
        $filtro_sql = "WHERE id = '$filtro' 
                  OR nome LIKE '%$filtro%'";
    }

?>
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
            <!-- Profile -->
            <div class="w3-card w3-round w3-white">
                <div class="w3-container">
                    <p class="w3-center"><img src="<?php echo $_SESSION['foto_usuario']; ?>" class="w3-circle"
                                              style="height:106px;width:106px" alt="Avatar"></p>
                    <h4 class="w3-center"><?php echo $_SESSION["nome_usuario"]; ?></h4>
                </div>
            </div>
            <br>

            <!-- Accordion -->
            <div class="w3-card w3-round">
                <div class="w3-white">
                    <button onclick="myFunction('Demo4')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Solicitação de Amizade</button>
                    <div id="Demo4" class="w3-hide w3-container">
                        <div class="w3-row-padding" style="overflow: scroll; height: 500px; overflow-x: hidden;: ">
                            <br>
                            <h9>Solicitação de Amizade </h9>
                            <hr class="w3-clear">
                            <?php
                            include_once"../conexao_bd.php";

                            $amizade = "SELECT amizade.*, log.nome, log.foto FROM amizade INNER JOIN log ON amizade.id_user = log.id;";
                            $return = $conexao->query($amizade);


                            if ($return == false) {
                                echo $conexao->error;

                            }

                            while ($registry = $return->fetch_array()) {
                                $id_amizade = $registry["id"];
                                $id_user =  $registry["id_user"];
                                $id_friend = $registry["id_friend"];
                                $status = $registry["status"];
                                $nome = $registry["nome"];
                                $foto = $registry["foto"];



                                if($id_friend == $_SESSION["id_usuario"] && $status == 1 ){
                                    echo
                                    "<div class='w3-card w3-round w3-white w3-center'>
                            
                                    <div class='w3-container'>
                                    <p></p>
                                    <img src='$foto' alt='Avatar' style='width:50%'><br>
                                    <span>$nome</span>
                                    <div class='w3-row w3-opacity'>
                                        <div class='w3-half'>                                       
                                        <a href='../aceitar.php?id=$id_amizade' class='w3-button w3-block w3-green w3-section' title='Accept'><i class='fa fa-check'></i></a>                                                                         
                                        </div>
                                        <div class='w3-half'>                                       
                                        <a  href='../recusar.php?id=$id_amizade' class='w3-button w3-block w3-red w3-section' title='Decline'><i class='fa fa-remove'></i></a>                                                                                   
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    &nbsp;";


                                }

                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-card w3-round">
                <div class="w3-white">
                    <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i
                                class="fas fa-search fa-fw w3-margin-right"></i> Procurar Amigos
                    </button>
                    <div id="Demo3" class="w3-hide w3-container">
                        <div class="w3-row-padding" style="overflow: scroll; height: 500px; overflow-x: hidden;: ">
                            <br>
                            <h9>Procurar Amigos</h9>
                            <form method="post" name = 'filtro'>
                            <input type="text" name="filtro" placeholder="Pequise amigos aqui!" class="w3-button">
                            <button type="submit" class="w3-button  w3-theme"><i class="fas fa-search"></i></button>
                            </form>
                            <hr class="w3-clear">
                            <div class="row">
                                    <?php
                                    include_once"../conexao_bd.php";

                                    $sql = "SELECT * 
                                            FROM log 
                                            $filtro_sql";

                                    $return = $conexao->query($sql);

                                    if ($return == false) {
                                        echo $conexao->error;

                                    }
                                    $id_user = $_SESSION["id_usuario"];
                                    while ($registry = $return->fetch_array()) {

                                        $id = $registry["id"];
                                        $nome = $registry["nome"];
                                        $foto = $registry["foto"];

                                        $amizade = "SELECT *
                                                    FROM amizade 
                                                    WHERE (id_friend = $id AND id_user = $id_user) or (id_friend = $id_user AND id_user = $id)";
                                        $retornar = $conexao->query($amizade);
                                        $status = NULL;
                                        if($registro = $retornar->fetch_array()){
                                            $status = $registro["status"];
                                        }

                                        if($status == 1){
                                            $btn = "<a class='w3-border' onclick='return confirm('Deseja desfazer a amizade?');' href='../cancelar.php?id=$id'><i class='fas fa-user-ninja'></i></a>";
                                            }
                                        else if($status == 2){
                                            $btn = "<a class='w3-border' onclick='return confirm('Deseja desfazer a amizade?');' href='../desfazer.php?id=$id'><i class='fas fa-user-minus'></i></a>";
                                        } else {
                                            $btn = "<a class='w3-border' onclick='return confirm('Deseja solicitar amizade?');' href='../solicitar.php?id=$id'><i class='fas fa-user-plus'></i></a>";
                                        }
                                        if (($id & 2) && ($id != $_SESSION["id_usuario"])) {
                                           echo " <div class='column'>
                                                        <figure>
                                                        <a href='../perfil/perfil_friend.php?id=$id'>
                                                        <img src='$foto' alt='Avatar' width='100px' height='100px'></a>
                                                        <figcaption>$nome $btn</figcaption>
                                                        </figure>
                                                      </div>";
                                        }
                                        elseif($id != $_SESSION["id_usuario"]){
                                            echo "<div class='column'>
                                                        <figure>
                                                        <a href='../perfil/perfil_friend.php?id=$id'>
                                                        <img src='$foto' alt='Avatar' width='100px' height='100px'></a>
                                                        <figcaption>$nome $btn</figcaption>
                                                        </figure>
                                                      </div>";
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <script>

            </script>

            <!-- End Left Column -->
        </div>