<?php 
    require('header.php');
    include_once 'conexao.php';

    $sql$sql= "SELECT * FROM kart";
    $resultado = $conn->prepare($sql);
    $resultado->execute();

    if(($resultado)and($resultado->RowCount()!=0)){
?>                
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
                <td><?php echo $total = $quantcompra * $price ?></td>
                <td>
                    <?php echo "<a href=''>" ; ?>
                    
                    <input type="submit" class="btn btn-danger" name="excluir" value="Excluir">
                </td>
                </tr> 
<?php         
        } 
?>
</tbody>
</table>
<?php         
    } 
?>
