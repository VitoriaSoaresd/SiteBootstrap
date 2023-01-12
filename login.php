<?php
    require_once 'header.php';
    include_once 'connection.php';

    session_start();
    ob_start();
?>

<?php

    //Exemplo para criptografar senha
   //echo "password".password_hash(123, PASSWORD_DEFAULT);

    $dadoslogin = filter_input_array (INPUT_POST, FILTER_DEFAULT);

    if (!empty($dadoslogin['btnlogin'])) {

    $buscalogin = "SELECT sid, name, email, password
                    FROM student
                    WHERE email =:usuario
                    LIMIT 1";
        
    $resultado= $conn->prepare($buscalogin);
    $resultado->bindParam(':usuario', $dadoslogin['usuario'], PDO::PARAM_STR);
    $resultado->execute();

    if(($resultado) AND ($resultado->rowCount()!=0)){
        $resposta = $resultado->fetch(PDO::FETCH_ASSOC);
        //var_dump($resposta);
        //var_dump ($dadoslogin);

        if(password_verify($dadoslogin['password'], $resposta ['password'])){
            $_SESSION['name'] = $resposta['name'];
            header("location: admin.php");
        } else{
            $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
        }    
    }else{
        $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
    }
    }

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Área do Aluno</title>

    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">


</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="login-form" class="form" action="" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="login" name="usuario">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="senha" name="password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Lembrar
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn" name="btnlogin">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Não tem conta?<a href="studentform.php">Cadastre-se aqui!</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Esqueceu sua senha?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php
    require_once 'footer.php';
?>