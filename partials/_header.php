<?php
    session_start(); 

    //Não alterar esta parte
    include '_dbConnection.php';

    $sql = "SELECT * FROM `categorias`"; 
    $result = mysqli_query($connection, $sql);

    //aqui pode alterar (parte visual)

    echo '<nav class="navbar navbar-expand-lg navbar-dark nav-cor fixed-top">
            <div class="container-fluid fonte">

              <a class="navbar-brand my-auto " href="index.php">
                <img src="img/logo.jpg" alt="" width="50" height="40" class="d-inline-block align-text-top">
              </a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ">
                  <li class="nav-item">
                    <a class="nav-link active fs-6" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <!--<a class="nav-link active fs-6" data-bs-toggle="modal" data-bs-target="#sobre">Sobre</a>-->
                    <a class="nav-link active fs-6" aria-current="page" href="index.php#sobre">Sobre</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active fs-6" aria-current="page" href="index.php#categorias">Categorias</a>
                  </li>
                </ul>';

                //não alterar o if
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                  $nome = $_SESSION['nomeUser'];
                  //não terminei a página do usuário xd
                  //pode alterar
                  echo '<form class="d-flex barra-busca pb-2 pt-2" action="search.php" method="get" >
                          <input class="form-control me-2 barra-opacidade pt-1 pb-1" name="search" type="search" placeholder="Assuntos e discussões" aria-label="Search">
                          <button class="btn btn-outline-success cor-botoes rounded-pill" type="submit">Buscar</button>
                        </form>
                        <a href="user.php"class="text-decoration-none text-white pe-3 pt-2 fonte-bemvindo"><p class="my-0 mx-2 cor-user pb-1 fs-5"> Bem vindo '. $_SESSION['nomeUser'] . '</p></a>
                        <a href="/ftalk/partials/_logout.php" class ="btn btn-danger ms-2 rounded-pill">Sair</a>
                      ';
                }else{
                  echo '
                        <form class="d-flex barra-busca pb-2 pt-1 " action="search.php" method="GET">
                          <input class="form-control me-2 barra-opacidade pt-1 pb-1" name="search" type="search" placeholder="Assuntos e discussões" aria-label="Search">
                          <button class="btn btn-outline-success cor-botoes rounded-pill" type="submit">Buscar</button>
                        </form>
                        <div>
                          <button class="btn cor-botoes rounded-pill me-1 " data-bs-toggle="modal" data-bs-target="#loginModal">Entrar</button>
                          <button class="btn cor-botoes rounded-pill" data-bs-toggle="modal" data-bs-target="#signupModal">Cadastre-se</button>
                        </div>
                      ';
                }
                  
              echo '</div>
            </div>
          </nav>';

  //não alterar os includes nem a estrutura básica do if
  include '_loginModal.php';
  include '_signupModal.php';

  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
    //pode alterar (parte visual)
    echo '<div class="alert alert-success alert-dismissible fade show mb-0 pt-4" role="alert">
            <strong>Conta criada!</strong> Para acessar o fórum, faça login!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    //não alterar
  }elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false"){
    //pode alterar
    echo '<div class="alert alert-warning alert-dismissible fade show mb-0 pt-4" role="alert">
            <strong>Falha na criação de conta</strong>, Tente novamente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
  else{
    
  }

  // Modal 
  echo '<div class="modal fade" id="about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sobre</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <p class="lh-sm fs-5 pb-5 px-1">&nbsp &nbsp &nbsp Somos o FTalk, criado pensando na carência de fórum para certos jogos, sendo produzido como rede social para a socialização e união da comunidade dos jogos, tanto a do celular quanto a do computados, trazemos a vocês uma rede social apenas para jogadores com vontade de aprender e conhecer gente nova que joga o mesmo jogo que o mesmo ou até mesmo só conversar sobre o jogo e algumas de suas experiências.</p>
                  <p class="lh-sm fs-5 pt-5 px-1 centro">Companhia Ftalk</p>
              </div>
              </div>
          </div>
        </div>'
?>