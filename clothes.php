<?php
  require('header.php');
?>
  
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 h-50" src="/imagens/bannerclo1.png" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-50" src="/imagens/bannerclo2.png" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-50" src="/imagens/bannerclo3.png" alt="Terceiro Slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>

    <div class="container-fluid">
      <div class="row title-clo">
        <div class="col-md-12 text-center">
          <h2>Produtos mais vendidos</h2>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row card-bestseller">
        <div class="col-md-4 card">
          <img class="card-img-top" src="imagens/roupa1.jpg" alt="Imagem de capa do card">
          <div class="card-body">
            <h5 class="card-title">Conjunto Summer</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. In tempore exercitationem magni eum esse.</p>
            <a href="#" class="btn btn-primary">Compre agora</a>
          </div>
        </div>

        <div class="col-md-4 card">
          <img class="card-img-top" src="imagens/roupa2.jpg" alt="Imagem de capa do card">
          <div class="card-body">
            <h5 class="card-title">Calça Crossfit</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. In tempore exercitationem magni eum esse.</p>
            <a href="#" class="btn btn-primary">Compre agora</a>
          </div>
        </div>
        
        <div class="col-md-4 card" style="width: 200px;">
          <img class="card-img-top" src="imagens/roupa3.webp" alt="Imagem de capa do card">
          <div class="card-body">
            <h5 class="card-title">Leggin Tropical</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. In tempore exercitationem magni eum esse.</p>
            <a href="#" class="btn btn-primary">Compre agora</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <div class="container newsletter-subscribe">
      <div class="intro">
          <h4 class="text-center">Receba todas as nossas promoções</h4>
          <p class="text-center">Quer receber nossas ofertas? Cadastre-se e comece a recebê-las!</p>
      </div>
      <form class="form-inline" method="post">
          <div class="form-group"><input class="form-control" type="email" name="email" placeholder="E-mail"></div>
          <div class="form-group"><button class="btn btn-primary" type="submit">Inscreva-se</button></div>
      </form>
      </div>
    </div>

<?php
  require('footer.php');
?>