<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/lightbox.css">
</head>
<body>

<?php include_once "layout_top_perfil.php"; ?>
<?php include_once "../column_left_empty.php"; ?>
<div class="w3-col m8">
    <?php
    include_once "../conexao_bd.php";

     $id = $_GET["id"];

    $s = "SELECT *
          FROM log
          WHERE id = $id";

        $retor = $conexao->query($s);

        $regis = $retor->fetch_array();
    
        $id = $regis["id"];
        $nome = $regis["nome"]; 
        $foto = $regis["foto"];
    ?>
    <div class="w3-row-padding">
        <div class="w3-col m12">
            <div class="w3-card w3-round w3-white">
                <div class="w3-container w3-padding">
                    <h4 class="w3-center"><?php echo $nome; ?></h4>
                    <p class="w3-center"><img src="<?php echo $foto; ?>" class="w3-circle"
                                              style="height:106px;width:106px" alt="Avatar"></p>
                    
                
                </div>
                &nbsp;
            </div>
            
        </div>
    </div>
    <!-- Upadate Posts -->
    <?php
    error_reporting(1);
    include_once "../conexao_bd.php";

    $sql = " SELECT post.*, log.nome, log.foto  
                  FROM post
                  INNER JOIN log
                  ON post.cod_user = log.id
                  ORDER BY id DESC";


    $retorno = $conexao->query($sql);

    while ($registro = $retorno->fetch_array()) {
        $cod_user = $registro["cod_user"];
        $nome = $registro["nome"];
        $foto = $registro["foto"];
        $postar = $registro["postar"];
        $img = $registro["img"];
        $date = $registro["data_post"];

        if ($cod_user == $id) {
            echo
            "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <img src='$foto' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:58px'>
        <span class='w3-right w3-opacity'>$date</span>
        <h4>$nome</h4><br>
        <hr class='w3-clear'>
        <p value=''>$postar</p>
        <div class='w3-row-padding' style='margin:0 -16px'>
            <div class='w3-half'>
            <a class=\"example-image-link\" href=\"$img\"data-lightbox=\"example-+$foto\"><img class=\"example-image w3-margin-bottom \"src=\"$img\"alt=\"image-1\" style=\"width:100%\"/></a>
            </div>   
        </div>
        <hr class='w3-clear'>
        <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>  Comment</button><br>
        <textarea name='comentario' id='comentario' class='w3-border w3-padding' rows='1px' style='background-color: #e7ebee; resize: none; width:100%' placeholder='Comente Aqui!' ></textarea>
        &nbsp;
        </div>";
        }


    }


    ?>
    


    <!-- End Middle Column -->
</div>
<!-- Right Column -->
</div>


<script src="../src/js/lightbox-plus-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>