<?php

  include_once 'connection.php';

  try{
    $dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    var_dump($dadoscad);

    if (!empty($dadoscad['btncad'])){
      
      $vazio = false;

      $dadoscad = array_map('trim', $dadoscad);
      if (in_array("", $dadoscad)) {
        $vazio = true;
        echo "<script>
        alert('Preencher todos os campos!');
        parent.location = 'studentform.php';
        </script>";
      } else if(!filter_var($dadoscad['email'], FILTER_VALIDATE_EMAIL)) {
        $vazio = true;
        echo "<script>
        alert('Informe um e-mail válido!');
        parent.location = 'studentform.php';
        </script>";
      }

    if(!$vazio) {

      $password = password_hash($dadoscad['password'], PASSWORD_DEFAULT);

      $sql = "INSERT INTO student(name, email, password, cellphone, cpf, rg, birth, sex, zipcode, housenumber, complement, photo) VALUES (:name, :email, :password, :cellphone, :cpf, :rg, :birth, :sex, :zipcode, :housenumber, :complement, :photo)";

      $salvar=$conn->prepare($sql);
      $salvar->bindParam(':name', $dadoscad['name'], PDO::PARAM_STR);
      $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
      $salvar->bindParam(':password', $password, PDO::PARAM_STR);
      $salvar->bindParam(':cellphone', $dadoscad['cellphone'], PDO::PARAM_STR);
      $salvar->bindParam(':cpf', $dadoscad['cpf'], PDO::PARAM_STR);
      $salvar->bindParam(':rg', $dadoscad['rg'], PDO::PARAM_STR);
      $salvar->bindParam(':birth', $dadoscad['birth'], PDO::PARAM_STR);
      $salvar->bindParam(':sex', $dadoscad['sex'], PDO::PARAM_STR);
      $salvar->bindParam(':zipcode', $dadoscad['zipcode'], PDO::PARAM_STR);
      $salvar->bindParam(':housenumber', $dadoscad['housenumber'], PDO::PARAM_STR);
      $salvar->bindParam(':complement', $dadoscad['complement'], PDO::PARAM_STR);
      $salvar->bindParam(':photo', $dadoscad['photo'], PDO::PARAM_STR);
      $salvar->execute();

      if($salvar->rowCount()){
        echo "<script>
        alert('Usuário cadastrado com sucesso!');
        parent.location = 'studentform.php';
        </script>";
        unset($dadoscad);
      } else {
        echo "<script>
        alert('Usuário não cadastrado.');
        parent.location = 'studentform.php';
        </script>";
      }
    }
  }
}

  catch(PDOException $erro){
    echo $erro;
  }

?>