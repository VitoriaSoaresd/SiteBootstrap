<?php
  require_once 'header.php';
  include_once 'connection.php';

  session_start();
  ob_start();

  $id = filter_input(INPUT_GET, "sid", FILTER_SANITIZE_NUMBER_INT);

  if (empty ($id)){
    $_SESSION['msg'] = "Erro: Usuário não encontrado!";
    header("Location: studentreport.php");
    exit();
  }

?>
