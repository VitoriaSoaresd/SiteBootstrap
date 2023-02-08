<?php
  require_once 'header.php';
  include_once 'connection.php';

  $cod = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_NUMBER_INT);

  if(empty($cod)){
    $_SESSION['msg'] = "Erro: Produto não encontrado!";
    header("Location: relprodutos.php");
    exit();
  }

  $sql = "SELECT * FROM product WHERE productcode = $cod LIMIT 1";
  $resultado = $conn->prepare();
  $resultado->execute();

  if(($resultado) and ($resultado->rowCount()!=0)){
    $linha = $resultado->fetch(PDO::FETCH_ASSOC);

    extract($linha);
  } else {
    $_SESSION['msg'] = "Erro: Produto não encontrado!"
    header("Location: relprodutos.php");
  }
?>

<form method="POST" action="productcontrol.php" enctype="multipart/form-data">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>Atualização de Produtos</h3>
      </div>
    </div>


<?php
  require_once 'footer.php';
?>
