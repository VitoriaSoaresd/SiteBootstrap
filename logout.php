<?php

  session_start();
  ob_start();

  unset($_SESSION['name']);
  $_SESSION['msg'] = "Sessão encerrada!";
  header("location: login.php");

?>

