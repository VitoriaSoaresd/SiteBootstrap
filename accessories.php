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
          <img class="d-block w-100 h-50" src="/imagens/academia1.jpg" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-50" src="/imagens/academia2.jpg" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-50" src="/imagens/academia3.jpg" alt="Terceiro Slide">
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
      <div class="row title-acc">
        <div class="col-md-12 text-center">
          <h2>Produtos mais vendidos</h2>
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