<?php
  include_once 'connection.php';

  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
    try{
      $dadosprod = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      //var_dump($dadosprod);

      if(isset($_FILES['photo'])){
        $arquivo = ($_FILES['photo']);

        if($arquivo['error']){
          echo 'Erro ao carregar arquivo';
          header ("Location: frmproduct.php");
        }

        $pasta = "/SiteBootstrap/products/";
        $nomearquivo = $arquivo['name'];
        $novonome = uniqid();
        $extensao = strtolower(pathinfo($nomearquivo, PATHINFO_EXTENSION));

        if($extensao!="jpg" && $extensao!="png"){
          die("Tipo não aceito!")
        }

        $salvaimg = move_uploaded_file($arquivo['tmp_name'], $pasta . $novonome . "." . $extensao);

        if($salvaimg) {
          $path = $pasta . $novonome . "." . $extensao;
          echo "Ok!";
        }
      }

      if(!empty($dadosprod['btncad'])){
        $vazio = false;

        $dadosprod = array_map('trim', $dadosprod);

        if(in_array("", $dadosprod)){
          $vazio = true;
          echo "<script>
                alert('Preencher todos os campos!');
                parent.location = 'frmproduct.php';
                </script>";
        }

        if(!$vazio){

          $sql = "INSERT INTO product (name, color, cost, size, amount, photo, cgid) VALUES (:name, :color, :cost, :size, :amount, :photo, :cgid)"

          $salvar=$conn->prepare($sql);
          $salvar->bindParam(':name', $dadosprod['name'], PDO::PARAM_STR);
          $salvar->bindParam(':color', $dadosprod['color'], PDO::PARAM_STR);
          $salvar->bindParam(':cost', $dadosprod['cost'], PDO::PARAM_STR);
          $salvar->bindParam(':size', $dadosprod['size'], PDO::PARAM_STR);
          $salvar->bindParam(':amount', $dadosprod['amount'], PDO::PARAM_STR);
          $salvar->bindParam(':photo', $path, PDO::PARAM_STR);
          $salvar->bindParam(':cgid', $dadosprod['cgid'], PDO::PARAM_INT);
          $salvar->execute();

          if($salvar->rowCount()){
            echo "<script>
                alert('Produto cadastrado com sucesso!');
                parent.location = 'frmproduct.php';
                </script>";
                
                unset($dadoscad);
          } else {
            echo "<script>
                alert('Produto não cadastrado!');
                parent.location = 'frmproduct.php';
                </script>";
          }
        }
      }

      if(!empty($dadosprod['btneditar'])){
        
        var_dump($dadosprod);

        $dadosprod = array_map('trim', $dadosprod);

        $sql = "UPDATE product SET name=:name, color=:color, cost=:cost, size=:size, amount=:amount, photo=:photo, cgid=:cgid WHERE productcode=:productcode";

        $salvar=$conn->prepare($sql);
        $salvar->bindParam(':name', $dadosprod['name'], PDO::PARAM_STR);
        $salvar->bindParam(':color', $dadosprod['color'], PDO::PARAM_STR);
        $salvar->bindParam(':cost', $dadosprod['cost'], PDO::PARAM_STR);
        $salvar->bindParam(':size', $dadosprod['size'], PDO::PARAM_STR);
        $salvar->bindParam(':amount', $dadosprod['amount'], PDO::PARAM_STR);
        $salvar->bindParam(':photo', $path, PDO::PARAM_STR);
        $salvar->bindParam(':cgid', $dadosprod['cgid'], PDO::PARAM_INT);
        $salvar->bindParam(':productcode', $dadosprod['productcode'], PDO::PARAM_INT);
        $salvar->execute();

        if($salvar->rowCount()){
          echo "<script>
                alert('Dados atualizados com sucesso!');
                parent.location = 'relprodutos.php';
                </script>";

          unset($dadoscad);
        } else{
          echo "<script>
                alert('Produto não atualizado!');
                parent.location = 'relprodutos.php';
                </script>";
        }
      }

    }
  catch(PDOException $erro){
    echo $erro;
  }
?>