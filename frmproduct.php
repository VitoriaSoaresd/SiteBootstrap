<?php
  require_once 'header.php';
  require_once 'connection.php';

  $sql = "SELECT * FROM category";
  $resultado=$conn->prepare();
  $resultado->execute();
?>

<form method="POST" action="productcontrol.php" enctype="multipart/form-data">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>Cadastro de Produto</h3>
      </div>
    </div>

    <div class="row">    
      <div class="col-md-8">
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="name">    
        </div>
      </div>   
            
      <div class="col-md-2">
        <div class="form-group">
          <label for="color">Cor</label>
          <input type="text" class="form-control" name="color">    
        </div>
      </div>   
            
      <div class="col-md-2">
        <div class="form-group">
          <label for="size">Tamanho</label>
          <input type="text" class="form-control" name="size">    
        </div>
      </div>  
    </div>

    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="quantidade">Quantidade</label>
          <input type="text" class="form-control" name="quantidade">    
        </div>
      </div>  

      <div class="col-md-2">
        <div class="form-group">
          <label for="value">Preço</label>
          <input type="text" class="form-control" name="value" onchange="this.value = this.value.replace(/,/g, '.')">    
        </div>
      </div>

      <div class="col-md-8">
        <div class="form-group">
          <label for="categoria">Categoria</label>
          <select name="categoria" class="form-control">

            <?php 
              if(($resultado) and ($resultado->rowCount()!=0)){
                while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
                  extract($linha);
            ?>

            <option value="<?php echo $cgid; ?>"> <?php echo $cgname; ?></option>

            <?php
                }
              }
            ?>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="photo">Imagem</label>
          <input type="file" class="form-control" name="photo">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 text-right">
        <input type="submit" class="btn btn-primary" value="enviar" name="btncad">
      </div>
    </div>


  </div>
</form>

<?php
  require_once 'footer.php';
?>