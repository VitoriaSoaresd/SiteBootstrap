<?php

  include_once 'connection.php';

  try{
    $dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    var_dump($dadoscad);

    if (!empty($dadoscad['btncad'])){

      $sql = "INSERT INTO student(name, email, password, cellphone, cpf, rg, birth, sex, zipcode, housenumber, complement, photo) VALUES (:name, :email, :password, :cellphone, :cpf, :rg, :birth, :sex, :zipcode, :housenumber, :complement, :photo)";

      $salvar=$conn->prepare($sql);
      $salvar->bindParam(':name', $dadoscad['name'], PDO::PARAM_STR);
      $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
      $salvar->bindParam(':password', $dadoscad['password'], PDO::PARAM_STR);
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
        echo "Usuário cadastrado com sucesso!";
        unset($dadoscad);
      } else {
        echo "Usuário não cadastrado com sucesso.";
      }
    }
  }

  catch(PDOException $erro){
    echo $erro;
  }

?>