<?php

session_start();

session_destroy();

echo "<script>
                alert('Deslogado com Sucesso!');
                location.href='../index.php';
              </script>";

?>