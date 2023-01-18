<?php

  require_once'header.php';
  include_once 'connection.php';

  $pageatual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
	$pag = (!empty($pageatual)) ? $pageatual : 1;

    $limitereg = 3;

    $inicio = ($limitereg * $pag) - $limitereg;

  $busca= "SELECT sid, cpf, name, cellphone, email FROM student LIMIT $inicio , $limitereg";

  $resultado = $conn->prepare($busca);
  $resultado->execute();

  if (($resultado) AND ($resultado->rowCount () !=0)){

    //Lembrar que esse echo é desnecessário e preciso configurar o front
    echo "<h1>Relatório de Alunos BeBody</h1> <br>";

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Matrícula</th>
      <th scope="col">CPF</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">E-mail</th>    
    </tr>
  </thead>
  <tbody>
    

<?php  
    while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
      
      extract($linha);
?>
     
      <tr>
        <th scope="row"><?php echo $sid ?></th>
        <td><?php echo $cpf ?></td>
        <td><?php echo $name ?></td>
        <td><?php echo $cellphone ?></td>
        <td><?php echo $email ?></td>
        <td>
          <?php echo "<a href='edit.php?sid=$sid'>";?> 
          <input type="submit" class="btn btn-primary btn-sm" name="edit" value="Editar">
        </td>
        <td>
        <?php echo "<a href='delete.php?sid=$sid'>";?>           
          <input type="submit" class="btn btn-danger btn-sm" name="delete" value="Excluir">
        </td>
      </tr>

<?php
    }
?>

  </tbody>
</table>

<?php
  }else{
    echo "Não há registros.";
  }

  //Contar os registros no BdD
  $qtregistro = "SELECT COUNT(sid) AS registros FROM student";
  $resultado = $conn->prepare($qtregistro);
  $resultado->execute();
  $resposta = $resultado->fetch(PDO::FETCH_ASSOC);

  //Quantidade de páginas que serão usadas - Quantidade de registros divido pela qnt de registro por pág
  $qnt_pagina = ceil($resposta['registros'] / $limitereg);

  //Máximo de links que aparece na página
  $maximo = 2;

  echo "<a href='studentreport.php?page=1'>Primeira</a> ";

  //Chamar a pag anterior verificando a quantidade de pag menos 1
  //também verificando se já não é a primeira pag

  for ($anterior = $pag - $maximo; $anterior <= $pag - 1; $anterior++){
    if ($anterior >=1) {
      echo "<a href='studentreport.php?page=$anterior'>$anterior</a> ";
    }
  }

  echo "$pag";

  for ($proxima = $pag + 1; $proxima <= $pag + $maximo; $proxima++) {
    if ($proxima <= $qnt_pagina){
      echo "<a href='studentreport.php?page=$proxima'>$proxima</a> ";
    }
  }

  echo "<a href='studentreport.php?page=$qnt_pagina'>Última</a> ";

?>