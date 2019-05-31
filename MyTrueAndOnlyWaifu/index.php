<?php
error_reporting(1);

if ($_POST != NULL) {
  
  include_once"conexao_bd.php";

  $user = addslashes($_POST["user"]);
  $senha = addslashes($_POST["senha"]);

  // criptografia da senha
  $senha = md5($senha);

  $sql = "SELECT *
      FROM log
      WHERE user = '$user'
      AND senha = '$senha'";

  $retorno = $conexao->query($sql);

  if ($retorno == false) {
    echo $conexao->error;
    exit;
  }

  if ($registro = $retorno->fetch_array()) {
    
    $id = $registro["id"];
    $nome = $registro["nome"];
    $foto = $registro["foto"];

    session_start();

    $_SESSION["logado"] = "ok";
    $_SESSION["id_usuario"] = $id;
    $_SESSION["nome_usuario"] = $nome;
    $_SESSION["foto_usuario"] = $foto;
    header("Location: feed/feed.php");

  }else{
     echo "<script>
                alert('Usuario ou Senha errado!');
              </script>";
  }
}


?>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/lightbox.css">
</head>
<body>
<?php include_once "layout_top_index.php";?>
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
   <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        
      </div>
      <br>

    <!-- End Left Column -->
      </div>

    <!-- Middle Column -->
    <div class="w3-col m7">

      <div class="w3-row-padding">
        <div class="w3-col m10">
          <div class="w3-card w3-round w3-white">
              <div class="w3-container">
               <h4 class="w3-center">My Waifu</h4>
               <p class="w3-center"><img src="https://britz.mcmaster.ca/images/nouserimage.gif/image" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                <hr>
                <form method="post">
					       
                  <div class="form-group">
                  <label>Usuario</label>
                  <input type="text" name="user" required class="form-control" >
                  </div>
                  <div class="form-group">
                  <label>Senha</label>
                  <input type="password" name="senha" required class="form-control" >
                  </div>
                 	<p><input class="w3-button w3-theme" type="submit" value="Entrar"></p>
                 	<p>Sem Cadastro? <a href ='cadastro/cadastrar.php?'>Clique aqui</a></p>
                 
               </div>
           		</form>
           </div>
        </div>
      </div>

      
    <!-- End Middle Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          
        </div>
      </div>
      <br>
    <!-- End Right Column -->
    </div>
  <!-- End Grid -->
  </div>



<script src="../src/js/lightbox-plus-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script></script>
</body>
</html>