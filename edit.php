<?php
  require_once 'header.php';
  include_once 'connection.php';

  session_start();
  ob_start();

  $id = filter_input(INPUT_GET, "sid", FILTER_SANITIZE_NUMBER_INT);

  if (empty ($id)){
    $_SESSION['msg'] = "Erro: Aluno não encontrado!";
    header("Location: studentreport.php");
    exit();
  }

  $sql ="SELECT * FROM student WHERE sid = $id LIMIT 1";
  $resultado= $conn->prepare($sql);
  $resultado->execute();  
  
  if(($resultado) AND ($resultado->rowCount()!=0)){
    $linha = $resultado->fetch(PDO::FETCH_ASSOC);
    //var_dump($linha);
    extract($linha);
  } else {
      $_SESSION['msg'] = "Erro: Aluno não encontrado!";
      header("Location: studentreport.php");
  }

?>

<div class="container-fluid texto">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Controle de aluno</h2>
        </div>
    </div>
</div>

<form method="POST" action="controlform.php">
    <div class="container">
        <div class="row">

        <div class="col-md-1">
                 <div class="form=group">
                    <label for="sid">Matrícula</label>
                    <input type="text" class="form-control" id="sid" name="sid" value="<?php echo $sid; ?>">
                </div>
            </div>

            <div class="col-md-4">
                 <div class="form=group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form=group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="sex">Sexo</label>
                    <p><input type="radio" name="sex" checked value="F"> Feminino
                        <input type="radio" name="sex" value="M"> Masculino
                    </p>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" onkeypress="$(this).mask('000.000.000-00');"
                            value="<?php echo $cpf; ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" id="rg" name="rg" value="<?php echo $rg; ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="birth">Data de Nascimento</label>
                            <input type="date" class="form-control" id="birth" name="birth" value="<?php echo $birth; ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cellphone">Telefone</label>
                            <input type="text" class="form-control" id="cellphone" name="cellphone" onkeypress="$(this).mask('(00)00000-0000')"
                            value="<?php echo $cellphone; ?>">
                        </div>
                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="zipcode">CEP</label>
                                    <input type="text "class="form-control" id="zipcode" name="zipcode" value=""
                                        onblur="pesquisacep(this.value);" value="<?php echo $zipcode; ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationDefault03">Endereço</label>
                                    <input type="text" class="form-control" id="street" name="street"
                                        placeholder="Rua/Estrada/Avenida" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="housenumber">Número</label>
                                    <input type="text" class="form-control" name="housenumber" value="<?php echo $housenumber; ?>">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="complement">Complemento</label>
                                    <input type="text" class="form-control" id="complement" name="complement"
                                    value="<?php echo $complement; ?>">
                                </div>
                            </div>



                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="district">Bairro</label>
                                            <input type="text" class="form-control" id="district" name="district">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">Cidade</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">Estado</label>
                                            <p>
                                                <input type="text" class="form-control" id="state" name="state">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="photo">Foto</label>
                                            <input type="text" class="form-control" name="photo" value="<?php echo $photo; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Tudo certo!
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="enviar" name="btnedit">Cadastrar</button>

</form>
