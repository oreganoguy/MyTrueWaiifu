<?php

  // Remove mensagem de alerta
  error_reporting(1);

  // Clicou em enviar? O POST Existe?
  if ($_POST != NULL) {


    include_once "../conexao_bd.php";

    $nome = addslashes($_POST["nome"]);
    $user = addslashes ($_POST["user"]);
    $senha = addslashes($_POST["senha"]);
    $email = addslashes($_POST["email"]);
    $foto = addslashes($_POST["foto"]);

    $senha = md5($senha);

    if ($nome != "" && $user != "" && $senha != "" ) {

      $sql = "INSERT INTO log (nome, user, senha, email, foto) 
              VALUES ('$nome', '$user', '$senha', '$email', '$foto')";

      $retorno = $conexao->query($sql);

      // Executou?
      if ($retorno == true) {

        echo "<script>
                alert('Cadastrado com Sucesso!');
                location.href='../index.php';
              </script>";

      } else {

        echo "<script>
                alert('Erro ao Cadastrar!');
              </script>";
        // Exibe do erro que o banco retorna
        echo $conexao->error;

      }

    } else {
        echo "<script>
                alert('Preencha todos os campos!');
              </script>";
    }

  }

?>


<html>
<head>
    <title>Cadastro</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/lightbox.css">
</head>
<body>
<?php include_once "../layout_top_index.php";?>
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

      
        <div class="w3-col m10">
          <div class="w3-card w3-round  w3-white" >
              <div class="w3-container">
               <h4 class="w3-center">Cadastro</h4>
               <p class="w3-center"><img src="https://britz.mcmaster.ca/images/nouserimage.gif/image" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                <hr>
                <form method="POST">
                  <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="nome" required class="form-control" >
                  </div>
                  <div class="form-group">
                  <label>Usuario</label>
                  <input type="text" name="user" required class="form-control" >
                  </div>
                  <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" required class="form-control" >
                  </div>
                  <div class="form-group">
                  <label>Senha</label>
                  <input type="password" name="senha" required class="form-control" >
                  </div>
                  <div class="form-group">
                  <label>Foto</label>
                  <input type="text" name="foto"  class="form-control">
                  </div>
                 	<p><input class="w3-button w3-theme" type="submit" value="Cadastrar"></p>
               
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