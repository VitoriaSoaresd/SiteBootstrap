<?php 
    require 'header.php';
    include_once 'connection.php';

    $totalcompra = 0;

    $sql= "SELECT * FROM kart";
    $resultado = $conn->prepare($sql);
    $resultado->execute();

    if(($resultado)and($resultado->RowCount()!=0)){
?>
    <form action="conclude.php" method="post">
        <table class="table">
        <thead>
         <tr>
            <th scope="col">Imagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Total</th>

         </tr>
        </thead>
     <tbody>

<?php
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
           
            extract($linha);       
?>        
                <tr>
                <td scope="row"><img src="<?php echo $photo ?>"style=widht:100px;height:100px;></td>
                <td><?php echo $name ?></td>
                <td><?php echo $price ?></td>
                <td><?php echo $quantcompra ?></td>
                <td><?php echo $total = $quantcompra * $price; $totalcompra += $total; ?></td>
                <td>
                    <input type="hidden" name="codigo" value="<?php echo $productcode; ?>">
                    <input type="submit" class="btn btn-danger" name="excluir" value="Excluir">
                </td>
                </tr> 
<?php         
        } 
?>
<tr><td><?php echo "Total da Compra - R$" . $totalcompra; ?></td></tr>
    </tbody>
            </table>
<?php
    $_SESSION["totalcompra"]=$totalcompra;
?>
<input type="submit" class="btn btn-primary" value="Finalizar Compra">
    </form>
<?php
    } 
?>
