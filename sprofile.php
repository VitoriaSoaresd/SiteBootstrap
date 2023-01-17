<?php
  require_once 'header.php';
  include_once 'connection.php';

    session_start();
    ob_start();
?>

<h1 class="text-center">Área do Aluno</h1>

<?php
  echo "Bem vinde," . $_SESSION['name'];

  if(!isset($_SESSION['name'])){
    $_SESSION['msg'] = "Erro: Necessário realizar o login para acessar a página!";
    header("Location: login.php");
  }
?>

<a href="logout.php"><button type="submit">Sair</button>