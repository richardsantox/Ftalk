<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="<script src="https://kit.fontawesome.com/95e4277467.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/discussionlist.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Fredoka+One&family=IBM+Plex+Mono:wght@500&family=Luckiest+Guy&family=Passion+One&family=Press+Start+2P&family=Righteous&family=Rubik:wght@300&family=Russo+One&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
   
    <title>FTalk: Seu fórum sobre games</title>
  </head>

<body class="fonte" id="topo">
<?php
    //Não alterar nada desta parte
    include 'partials/_header.php';
    include 'partials/_dbConnection.php';

    $pesquisa = $_GET['search'];
    $id = $_SESSION['idUser'];
?> 

<?php

    //Não alterar nada deste começo
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        $th_title = $_POST['title'];
        //proteção contra xss attack
        $th_title = str_replace("<", "&lt;" , $th_title);
        $th_title = str_replace(">", "&gt;" , $th_title);

        $th_desc = $_POST['desc'];
        $th_desc = str_replace("<", "&lt;" , $th_desc);
        $th_desc = str_replace(">", "&gt;" , $th_desc);

        $user_envi  = $_SESSION['idUser'];
        $sql = "INSERT INTO `discussao` (`tituloDisc`, `descDisc`, `id_user_Disc`, `id_cat_Disc`, `timestamp`) VALUES ('$th_title', '$th_desc', '$user_envi', '$id', current_timestamp())";
        $result = mysqli_query($connection, $sql);
        $showAlert = true;
        if($showAlert){
            //aqui pode alterar, parte do front!
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Postagem efetuada!</strong> Espere os membros da comunidade interagir.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }

?>

    <main class="nao-entra">
        <div class="container search my-5">

           <!-- Resultados da Pesquisa -->

                <div>
                    <h1 class="title-search"> Resultados da Pesquisa sobre: "<em><?php echo $_GET['search']?></em> "</h1>
                    <hr class=" linha rounded-pill">
                    <div class="size-page">

<?php
    $semresultado = true;
    $sql = "SELECT * FROM `discussao` WHERE MATCH (`tituloDisc`, `descDisc`) against ('$pesquisa')"; 
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tituloDisc = $row['tituloDisc'];
        $descDisc = $row['descDisc'];
        $idDisc = $row['idDisc'];
        $url = "discussion.php?catid=". $idDisc;
        $semresultado = false;

        $userid = $row['id_user_Disc'];
        $sql2 = "SELECT nomeUser FROM `user` Where idUser='$userid'";
        $result2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $nomeUsuario = isset($row2['nomeUser']) ? $row2['nomeUser'] : "Usuário Desativado";

        // Display dos resultados pesquisa
        echo'<div class="card border border-info rounded-2 mb-1">
                <div class="d-flex my-1 card-header">
                    <img src="img/defaultuser.jpg" width="34px" class="me-1 img-fluid" alt="Imagem de usuário padrão">
                    <strong class="card-text"> Criador do tópico: '.$nomeUsuario.'</strong>
                </div> 
                <div class="card-body">
                    <h4><a class="text-dark" href="'. $url.'">' . $tituloDisc . '</a></h4>
                    <p class="card-text fs-6 m-1">' . $descDisc . '</p>
                </div>
            </div> 
            <hr class="my-4 linha rounded-pill">';
        }
        
    if ($semresultado){ 
            echo'<div class="card border border-info rounded-2 mb-1 ms-3 mt-3 container my-4 ">
                    <div class=" ms-3 mt-3 ">
                        <div class="">
                        <p>Sem resultados para a sua pesquisa</p>
                        </div>
                    <hr>
                    <p class="lead"> Sugestão: <ul>
                                <li>Veja se todas as palavras estão corretas.</li>
                                <li>Tente letras diferentes.</li></ul>
                                
                        </p>
                </div>';

    };
?>                   
                </div>
            </div>
        </div> 

    </main>

<?php
    //não alterar
    include 'partials/_footer.php';
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
