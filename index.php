<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FTalk: Seu fórum sobre games</title>

    <meta name="description" content="Fórum para discussão sobre tópicos de jogos.">
    <meta name="robots" content="index">
    <meta name="author" content="Equipe Ftalk">
    <meta name="keywords" content="ftalk, free fire, forum, jogos, games, gamers, chat, rede, social, cs, csgo">

    <meta property="og:type" content="website">
    <meta property="og:url" content="xxx">
    <meta property="og:title" content="FTalk: Seu fórum sobre Free Fire!">
    <meta property="og:image" content="img aqui">
    <meta property="og:description" content="Fórum para discussão sobre tópicos de jogos.">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@FTalk">
    <meta name="twitter:title" content="FTalk: Seu fórum sobre Free Fire!">
    <meta name="twitter:creator" content="@FTalkUser">
    <meta name="twitter:description" content="Fórum para discussão sobre tópicos de jogos.">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="<script src="https://kit.fontawesome.com/95e4277467.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?&family=IBM+Plex+Mono:wght@500&family=Luckiest+Guy&family=Passion+One&family=Righteous&family=Rubik:wght@300&family=Russo+One&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
  </head>
  
  <body class="fonte nao-entra">
<?php
    include 'partials/_header.php';
    include 'partials/_dbConnection.php';
?>

<main>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <!--Insira as imagens do carousel aí em baixo (carousel)-->
            <div class="carousel-item active">
                <img src="img/controles.jpg" class="d-block w-100 img-carrossel" alt="...">
                <div class="carousel-caption  h-50">
                    <h5 class="display-4">Encontre a sua comunidade</h5>
                    <p class="text-center fs-5">Aqui está tudo aquilo que vc pecisa saber sobre a sua comunidade favorita</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/celular.jpg" class="d-block w-100 img-carrossel" alt="...">
                <div class="carousel-caption h-50">
                    <h5 class="display-4">Discuta sobre seus jogos favoritos</h5>
                    <p class="text-center fs-5">Jogos online aproximam as pessoas, queremos tornar sua experiência unica</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/setaup.jpg" class="d-block w-100 img-carrossel" alt="...">
                    <div class="carousel-caption h-50">
                        <h5 class="display-4">Encontre pessoas que te entendam</h5>
                        <p class="text-center fs-5">Seja você mesmo, se conecte com quem você adora jogar e fique por dentro do que rola na sua comunidade</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- mini-img -->
        <section id="cliens" class="cliens section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="img/riot.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="img/playstation.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="img/steam.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="img/play-store.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="img/xbox.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="img/epic.png" class="img-fluid" alt="">
                </div>

                </div>

            </div>
        </section>
            
        <!-- Sobre -->
        <section class="d-flex align-items-center text-dark" id="sobre">
            <div class="container" >
                <div class="row d-flex align-items-center">
                    <div class="col-lg-7" data-aos="fade-right">
                        <div class="section-title">
                            <h2 class="display-6">Sobre nós</h2>
                        </div>
                        <div class="conteudo-sobre ">
                            <h2>Ftalk <br> Seu fórum gamer </h2>
                            <p class="py-2 fs-5">FTalk é um Fórum, uma rede social que conta com forúns separados por categorias e tópicos de conversa.
                                O objetivo da FTalk é fazer com que o usuário possa ser ele mesmo, se conecte com quem adora jogar e fique por dentro das mais recentes discussões sobre seus tópicos favoritos.
                                Esses tópicos levam o usuário a escolher a aventura que o aguarda dentro de conversas construtivas e informativas sobre os seus jogos favoritos. Dentro desses foruns sera possivel que os usuários interajam e façam amigos com os interesses em comum.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center py-4 py-sm-0" data-aos="fade-down"> 
                        <img class="img-fluid mario " src="img/marioGIF.gif" alt="about" >
                    </div>
                    <div class="my-5 conteudo-sobre">
                        <a class="botao fs-5" href="#projeto">Conheça mais</a>
                    </div>
                </div>
            </div> 
        </section>

        <!-- Projeto -->
        <section class="d-flex align-items-center text-dark " id="projeto">
            <div class="container" >
                <div class="row d-flex align-items-center">
                    <div class="col-lg-5 text-center py-4" data-aos="fade-down"> 
                        <img class="img-fluid" src="img/logo.jpg" alt="about" >
                    </div>
                    <div class="col-lg-7" data-aos="fade-right">
                        <div class="section-title">
                            <h2 class="display-6">Projeto</h2>
                        </div>
                        <div class="conteudo-projeto ps-3">
                            <h2 class="text-white">Ftalk <br> E sua história </h2>
                            <p class="py-2 text-white">A FTalk foi criada sendo um Trabalho de Conclusão de Curso proposto pela Etec Professora Maria Cristina Medeiros,
                                querendo suprir a carência de fóruns para certos jogos à um público-alvo específico, com foco para a socialização e união da comunidade de jogos, 
                                tanto para aparelhos móveis quanto para desktops. Aqui é proposto uma rede social aberta à jogadores e entusiastas com sede de aprender, 
                                conhecer e expandir o mundo limitado que a falta de recursos proporcionava antes da chegada do Team FTalk.
                            </p>    
                            <div class="d-md-flex justify-content-md-end my-4">
                                <a class="botao fs-5" href="#categorias">Conheça um pouco mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        
        <!-- Uso para link ancora -->
        <div id="categorias"></div> 
        <!-- Categorias -->
        <article class="container my-5" id="ques">
            <div class="section-title">
                <h2 class="display-6 pt-5">Categorias do FTalk</h2>
            </div>
            <p class="pb-5 mx-5 text-center">
                A FTalk foi criada com o obetivo de reunir e aproximar jogadores que gostem dos mesmos jogos e assuntos, 
                com foco para a socialização e união da comunidade gamer, de todas as plataformas. 
            </p>
            <div class="row jus">
                <?php 
                    /* NÃO ALTERE ESTA SESSÃO!!!! */
                    /* explicando o código: nós buscamos tudo de categorias e, após isto, fazemos um loop para sempre atualizar xd */
                    $sql = "SELECT * FROM `categorias`"; 
                    $result = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        //echo $row['idCategoria'];
                        //echo $row['nomeCategoria'];
                        //echo $row['descCategoria'];
                        //echo $row['criado'];

                        $idCat = $row['idCategoria'];
                        $name = $row['nomeCategoria'];
                        $desc = $row['descCategoria'];

                        //pode alterar, com excessão da imagem, falar comigo antes de alterar ela.
                        echo '<div class="col md-4 m-3">
                                <div class="card card-inteiro centro ">
                                    <!--Insira as imagens dos cards aí em baixo-->
                                    <img src="img/Categorias/'. /* cat-$nome.jpeg tomar cuidado - img video 52 at 10:00*/$name .'.jpg" class="card-img-top card-img-posicao " alt="...">
                                    <div class="card-body">
                                        <h4 class="card-title h3"><a class="card-titulo" href="discussionlist.php?catid=' . $idCat . '">' . $name . '</a></h4>
                                        <p class="card-text text-white fs-6">' . $desc . '</p>
                                    </div>
                                </div>
                            </div>';}
                ?>
            </div>
        </article>

        <!-- Equipe -->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center section-title">
                    <h2 class="display-6">Equipe</h2>
                    <p class="fs-5 ">Esse é o time que compõe a Ftalk.</p>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member text-center">
                            <img class="mx-auto rounded-circle mb-2" src="img/luisa.jpeg" alt="..." />
                            <h4>Luiza Fernandes</h4>
                            <p class="text-muted">Diretora de design e conteúdo</p>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle mb-2" src="img/vinicius.jpeg" alt="..." />
                            <h4>Vinicius Campos</h4>
                            <p class="text-muted">Diretor executivo e segurança</p>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle mb-2" src="img/otavio.jpeg" alt="..." />
                            <h4>Otavio Magalhaes</h4>
                            <p class="text-muted">Diretor de dados e informação</p>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle mb-2" src="img/luis.jpg" alt="..." />
                            <h4>Luis Yoshikawa</h4>
                            <p class="text-muted">Diretor financeiro e marketing</p>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle mb-2" src="img/richard.jpg" alt="..." />
                            <h4>Richard Santos</h4>
                            <p class="text-muted">Diretor de tecnológia e desenvolvimento</p>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row mb-0 pb-0">
                    <!--<div class="col-lg-6 mx-auto text-center"><p class="large text-muted">Considerações</p></div>
                    <img src="" alt="" srcset="">-->
                </div>
            </div>
        </section>

</main>  
    <footer class="footer-20192" id="contato">
            <div class="container">
                <div class="cta d-block d-md-flex align-items-center px-5 rounded-2">
                    <div>
                        <h2 class="mb-0">Tem alguma sugestão?</h2>
                        <h3 class="text-dark ">Entre em contato conosco</h3>
                    </div>
                    <div class="ms-auto me-5"> 
                        <a class="btn btn-dark rounded-3 px-4 fs-4 footer-hover-btn" data-bs-toggle="modal" data-bs-target="#contactModal">Contato</a>
                       
                    </div>
                </div>
            </div>
        </div>    
    </footer>
<?php
    //não alterar
    include 'partials/_footer.php';
    include 'partials/_contactModal.php';
?>

        <script src="https://kit.fontawesome.com/95e4277467.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
