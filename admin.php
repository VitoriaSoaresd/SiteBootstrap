<?php
  require_once 'header.php';
  include_once 'connection.php';

    session_start();
    ob_start();
?>

<h1 class="text-center">Área do Aluno</h1>

<?php
  echo "Bem vinde," . $_SESSION['name'];
?>

<a href="logout.php"><button type="submit">Sair</button>