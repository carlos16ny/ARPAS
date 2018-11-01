<?php

    $tituloPagina = 'ARPAS';
    include 'assets/templates/header.php';
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <strong>A.R.P.A.S.</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navToggle" 
                aria-expanded="false" aria-label="Toggle navigation" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navToggle">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quarto">Quartos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servico">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Contato</a>
                    </li>
                </ul>

                <div>
                    <a href="user/index.php">
                        <button class="btn btn-personal">Login</button>
                    </a>
                </div>

            </div>
        </div>
    </nav>
    <div class="view">
        <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-12 mb-5 mt-md-0 mt-3 white-text text-center text-md-left">
                        <div class="logo mx-auto">
                            <?php include 'assets/templates/logo.php'?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



<section class="my-5 mx-5" id="quarto">

<h2 class="h1-responsive font-weight-bold text-center my-5">Quartos</h2>

<p class="grey-text text-center w-responsive mx-auto mb-5">
    Oferecemos serviços de hospedagem a um preço acessivel com qualidade e conforto.
</p>

    <div class="row">
        <div class="col-lg-5">

            <div class="overlay rounded z-depth-2 mb-lg-0 mb-4">
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/img%20(27).jpg" alt="Sample image">
                <a>
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>

        </div>

        <div class="col-lg-7">

            <a href="#!" class="green-text"><h6 class="font-weight-bold mb-3"><i class="fas fa-hotel"></i> | Quarto</h6></a>
            <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus et aut officiis debitis.</p>
        </div>  
    </div>

  <hr class="my-5">

  <div class="row">
    <div class="col-lg-7">
      <a href="#!" class="pink-text"><h6 class="font-weight-bold mb-3"><i class="fa fa-warehouse pr-2"></i> | Area comum</h6></a>
      
      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>


    </div>
    <div class="col-lg-5">
      <div class="overlay rounded z-depth-2">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/img%20(34).jpg" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
    </div>
  </div>

</section>

<section class="my-5 p-5" id="servico">

  <h2 class="h1-responsive font-weight-bold text-center my-5">Nossos Serviços</h2>
  <p class="lead grey-text text-center w-responsive mx-auto mb-5">Para melhor comodidate dos nossso clientes dispomos de alguns serviços pra melhor atende-los</p>

<!-- Wifi -->
  <div class="row">
    <div class="col-md-4 mb-md-0 mb-5">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-2 mr-1">
          <i class="fa fa-wifi blue-text fa-2x"></i>
        </div>

        <div class="col-lg-10 col-md-9 col-10">
          <h4 class="font-weight-bold">Wifi</h4>
          <p class="grey-text">Todos os quartos dispõe de conexão wifi para maior comodidade</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-md-0 mb-5">
<!-- Café -->
      <div class="row">

        <div class="col-lg-2 col-md-3 col-2 mr-1">
          <i class="fa fa-coffee pink-text fa-2x"></i>
        </div>

        <div class="col-lg-10 col-md-9 col-10">
          <h4 class="font-weight-bold">Café da manhã</h4>
          <p class="grey-text">As diárias incluem um delicioso café da manhã que é servido das 06h - 09h</p>
        </div>

      </div>
    </div>

    <div class="col-md-4">
<!-- Limpeza -->
      <div class="row">

            <div class="col-lg-2 col-md-3 col-2 mr-1">
                <i class="fa fa-broom purple-text fa-2x"></i>
            </div>

            <div class="col-lg-10 col-md-9 col-10">
                <h4 class="font-weight-bold">Limpeza</h4>
                <p class="grey-text">Os qaurtos recebe limpeza diária para que o cliente se sinta em casa</p>
            </div>

      </div>

    </div>

  </div>

</section>



<section class="rgba-gradient" id="contato">

    <div class="mx-5 mt-5 py-4">

        <h2 class="h1-responsive font-weight-bold white-text text-center my-3">
            Contato
        </h2>

        <p class="text-center mx-auto pb-4 white-text">Caso queira deixar um mesagem ou ligar para fazer alguma reserva, os nossos contaos estão aqui!</p>

        <div class="row">
            <div class="col-lg-5 mb-lg-0 mb-4">
                <div class="card px-2 py-2" id="card-mensagem">
                    <div class="card-body">   
                        <div class="form-header accent-1">
                            <h3 class="mt-2 white-text"><i class="fa fa-envelope"></i> Contate-nos</h3>
                        </div>
                        <p class="white-text">Responderemos o mais rápido possível</p>
                
                        <div class="md-form">
                            <i class="fa fa-user prefix white-text"></i>
                            <input type="text" id="form-name" class="form-control">
                            <label for="form-name">Nome</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix white-text"></i>
                            <input type="text" id="form-email" class="form-control">
                            <label for="form-email">Email</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-tag prefix white-text"></i>
                            <input type="text" id="form-Subject" class="form-control">
                            <label for="form-Subject">Assunto</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-pencil prefix white-text"></i>
                            <textarea type="text" id="form-text" class="form-control md-textarea" rows="3"></textarea>
                            <label for="form-text">Mensagem</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-light-blue">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">

                <div id="map-container" class="rounded z-depth-1-half map-container">
                </div>

                <br>
                <div class="row text-center white-text">
                    <div class="col-md-4">
                        <a class="btn-floating accent-1">
                            <i class="fa fa-map-marker"></i>
                        </a>
                        <p>João Monlevade</p>
                        <p class="mb-md-0">MG</p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating accent-1">
                            <i class="fa fa-phone"></i>
                        </a>
                        <p>31 9999 99999</p>
                        <p class="mb-md-0">Seg - Dom | 7h - 21h</p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating accent-1">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <p>info@gmail.com</p>
                        <p class="mb-0">ifo@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'assets/templates/footer.php'; ?>


