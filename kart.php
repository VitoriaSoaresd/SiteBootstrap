<?php
    session_start();
    ob_start();

    require_once 'conexao.php';

    $_SESSION["quant"]+=1;

    echo $_SESSION["quant"];

    $cesta = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $codigoproduto = $cesta["productcode"];
    $quantcompra = $cesta["quantcompra"];

    $sql= "SELECT productcode, name, cost, amount, photo
            FROM product
            WHERE productcode = $codigoproduto
            LIMIT 1";

    $resultado = $conn->prepare($sql);
    $resultado->execute();

    if(($resultado)and($resultado->RowCount()!=0)){
        $linha=$resultado->fetch(PDO::FETCH_ASSOC);
        extract($linha);
        //var_dump($linha);

        if($quantidade<$quantcompra){
            echo "Quantidade fora de estoque!"; //colocar um alert ao invés de echo
            header("Location:index.php");
        }else{
            $sql2 = "INSERT INTO kart(productcode, nome, quantcompra, price, foto)
                        VALUES (:productcode, :nome, :quantcompra, :price, :foto)";
            $salvar2 = $conn->prepare($sql2);
            $salvar2->bindParam(':productcode', $codigoproduto, PDO::PARAM_INT);
            $salvar2->bindParam(':name', $name, PDO::PARAM_INT);
            $salvar2->bindParam(':quantcompra', $quantcompra, PDO::PARAM_INT);
            $salvar2->bindParam(':price', $price, PDO::PARAM_INT);
            $salvar2->bindParam(':photo', $photo, PDO::PARAM_INT);
            $salvar2->execute();
        }
    }

?>