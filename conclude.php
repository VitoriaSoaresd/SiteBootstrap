<?php
  session_start ();
  ob_start();

  require_once 'connection.php';

  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  $productcode = $dados["codigo"];

  if(!empty($dados["excluir"])){

    $sqlexcluir = "DELETE FROM kart WHERE productcode = $productcode";
    $resulexcluir = $conn->prepare($sqlexcluir);
    $resulexcluir->execute();
    $_SESSION["quant"]-=1;

  }else{
    if(!isset($_SESSION['name'])) {
      $_SESSION["kart"] = true
      echo "<script>
      alert('Faça Login para Finalizar sua Compra!');
      parent.location = 'login.php';
      </script>"
    }else{
      //acesar pagamento
      $date = date('y-m-d');
      $value = $_SESSION['totalcompra'];
      $sid = $_SESSION["sid"];

      $sqlvenda = "INSERT INTO sale (date, value, sid) VALUES (:date, :value, :sid)";
      $salvarvenda = $conn->prepare($sqlvenda);
      $salvarvenda->bindParam(':date', $date, PDO::PARAM_STR)
      $salvarvenda->bindParam(':value', $value, PDO::PARAM_STR)
      $salvarvenda->bindParam(':sid', $sid, PDO::PARAM_STR)
      $salvarvenda->execute();
      
      $venda = "Select LAST_INSERT_ID()";
      $resulvenda = $conn->prepare($venda);
      $resulvenda->execute();

      $linhavenda = $resulvenda->fetch(PDO::FETCH_ASSOC);

      $saleid = ($linhavenda["LAST_INSERT_ID()"]);

      $busca = "SELECT * FROM kart";
      $resulbusca = $conn->prepare();
      $resulbusca->execute();

      if(($resulbusca) && ($resulbusca->rowCount()!=0)){
        while ($linha = $resulbusca->fetch(PDO::FETCH_ASSOC)){
          extract($linha);

          $sqlitem = "INSERT INTO item (saleid, productcode, value, amount) VALUES (:saleid, :productcode, :value, :amount)";
          $salvaritem = $conn->prepare();
          $salvaritem->bindParam(':saleid', $saleid, PDO::PARAM_INT);
          $salvaritem->bindParam(':productcode', $productcode, PDO::PARAM_INT);
          $salvaritem->bindParam(':value', $value, PDO::PARAM_STR);
          $salvaritem->bindParam(':amount', $quantcompra, PDO::PARAM_INT);
          $salvaritem->execute();

          $estoque = "UPDATE product SET amount=(amount - $quantcompra)
                      WHERE productcode = $productcode";
          $atualiza = $conn->prepare($estoque);
          $atualiza->execute();
        }
      }

      $sqllimpa = "DELETE FROM kart";
      $limpa = $conn->prepare();
      $limpa->execute();
      $_SESSION["quant"]=0;
      echo "<script>
      alert('Compra finalizada com sucesso!');
      parent.location = 'index.php';
      </script>"

      unset($_SESSION['kart']);
    }
  }
?>