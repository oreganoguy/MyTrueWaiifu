<?php
    session_start();
    error_reporting(1);

  if ($_POST != NULL) {

    
    include_once "../conexao_bd.php";

    $nome = addslashes($_POST["nome"]);
    $email = addslashes($_POST["email"]);
    $foto = addslashes($_POST["foto"]);
    $id_user = $_SESSION["id_usuario"];
    
    if ($nome != "") {

      $sql = "UPDATE log 
              SET nome ='$nome',
                  email = '$email',
                  foto = '$foto'
              WHERE id = $id_user";
      
      $retorno = $conexao->query($sql);

      if ($retorno == true) {
          $_SESSION["nome_usuario"] = $nome;
        echo "<script>
                alert('Editado com Sucesso!');
                location.href='perfil.php';
              </script>";

      } else {

        echo "<script>
                alert('Erro ao Cadastrar!');
              </script>";

        echo $conexao->error;

      }

    } else {
        echo "<script>
                alert('Preencha todos os campos!');
              </script>";
    }

  }

?>

<?php
   include_once "../conexao_bd.php";
   $id_user = $_SESSION["id_usuario"];
   $sql_log = "SELECT * FROM log WHERE id = $id_user";
   $ret_log = $conexao->query($sql_log);

    if ($retorno == false) {
    echo $conexao->error;
  }

    if ($regis = $ret_log->fetch_array()) {
    $nome = $regis["nome"];
    $email = $regis["email"];
    $foto = $regis["foto"];
    $id_user = $_SESSION["id_usuario"];
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
<?php include_once "../layout_top.php";?>
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
               <h4 class="w3-center">Editar Perfil</h4>
               <p class="w3-center"><img src="<?php echo $_SESSION['foto_usuario']; ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                <hr>
                <form method="POST">
                  <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="nome" required class="form-control" value="<?php echo $nome?>" >
                  </div>
                  <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" required class="form-control" value="<?php echo $email?>">
                  </div>
                  <div class="form-group">
                  <label>Foto</label>
                  <input type="text" name="foto"  class="form-control" value="<?php echo $foto?>">
                  </div>
                 	<input class="w3-button w3-theme" type="submit" value="Editar">
               
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