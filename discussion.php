<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"><link href="<script src="https://kit.fontawesome.com/95e4277467.js" crossorigin="anonymous"></script>
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
    //não alterar
    include 'partials/_header.php';
    include 'partials/_dbConnection.php';

    //não alterar
    $id = $_GET['catid'];

    $sql = "SELECT * FROM `discussao` WHERE idDisc='$id'"; 
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tituloDisc = $row['tituloDisc'];
        $descDisc = $row['descDisc'];

    };
?> 

<?php
    //não alterar
    $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            $com_content = $_POST['comment'];
            //proteção contra xss attack 
            $com_content = str_replace("<", "&lt;" , $com_content);
            $com_content = str_replace(">", "&gt;" , $com_content);
            $user_envi  = $_SESSION['idUser'];
            $sql = " INSERT INTO `comentarios` (`conteudoComent`, `idDisc_Coment`, `timeComentario`, `enviadoPor`) VALUES ( '$com_content', '$id', current_timestamp(), '$user_envi'); ";
            $result = mysqli_query($connection, $sql);
            $showAlert = true;
            
            if($showAlert){
                //pode alterar
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Comentário efetuado!</strong> Espere os membros da comunidade interagir.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        }
?>

<main class="nao-entra">
    <div class="container my-4">
        <div class="jumbotron2">
            <h1 class="display-5"><?php echo $tituloDisc; ?></h1>
            <p class="lead fs-5 fst-italic"><?php echo $descDisc; ?></p>
            <hr class="my-4 linha rounded-pill">
        </div>
    </div> 


<?php
    //não alterar
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    //pode alterar, exceto a parte do $_SERVER['request_uri '] e do method
    echo'<div class="container">
            
        </div>
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-8">
                    <div class="container">
                        <h2 class="py-2">Envie seu comentário</h2>
                        <div class="card ">
                            <div class="card-body border border-info rounded-2">
                                <form action="' . $_SERVER["REQUEST_URI"] .'" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Digite o seu comentário aqui, '.$_SESSION['nomeUser'] .'.</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                        <input type="hidden" name="idUser" value="'. $_SESSION["idUser"] .'">
                                    </div>
                                    <button type="submit" class="btn cor-botoes">Enviar Comentário</button>
                                </form>
                            </div>
                        </div>
                        ';
    }else{
        echo'<div class="container py-0 my-0">
                <h1 class="py-2">Envie seu comentário</h1>
                <div class="alert alert-danger" role="alert">
                    Você deve estar logado para poder criar um comentário!
                </div>
            </div>';
    }
?>
                        <div class="container my-4" id="ques">
                            <h2 class="py-2">Discussões</h2>
                            <div class="card border border-info rounded-2 mb-1">
                            
<?php
                                //não alterar este começo
                                $id = $_GET['catid'];

                                $sql = "SELECT * FROM `comentarios` WHERE idDisc_Coment=$id"; 
                                $result = mysqli_query($connection, $sql);
                                $noResult = true;
                                while($row = mysqli_fetch_assoc($result)){
                                $noResult = false;
                                $idComent = $row['idComentario'];
                                $content = $row['conteudoComent'];
                                $com_time = $row['timeComentario'];

                                $userid = $row['enviadoPor'];
                                $sql2 = "SELECT nomeUser FROM `user` Where idUser='$userid'";
                                $result2 = mysqli_query($connection, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);

                                echo'<div class=" ms-3 mt-3 ">
                                        <img src="img/defaultuser.jpg" width="34px" height="34px class="mr-3" alt="...">
                                            '.$row2['nomeUser'].' às ' /*cuidado quando alterar esta parte com variáveis. */ . $com_time . '
                                        <div class="">
                                            <p class="card-text">'. $content . '</p>
                                        </div>
                                        <hr>
                                    </div>';
                                };
?>
                            </div>
                        </div>
    <?php   echo'   </div>
                </div>
                <div class="col-md-4 d-none d-md-block">
                    <div class="container">
                        <div class="card card-regras centro">
                            <div class="card-body">
                                <p class="card-text fs-6">Este fórum é para discussão de tópicos sobre neste caso, respeite a opinião de todos e não desrespeite qualquer tipo de <a href="#" class="text-decoration-none cor-regras">regras.</a></p>
                            </div>
                        </div>';

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

                echo'   <div class="col md-4 m-3">
                            <div class="card card-direita centro ">
                                <!--Insira as imagens dos cards aí em baixo-->
                                <img src="img/Categorias/'. /* cat-$nome.jpeg tomar cuidado - img video 52 at 10:00*/$name .'.jpg" class="card-img-top card-img-posicao " alt="...">
                                <div class="card-body">
                                    <h4 class="card-title "><a class="card-titulo" href="discussionlist.php?catid=' . $idCat . '">' . $name . '</a></h4>
                                    <p class="card-text text-white fs-6">' . $desc . '</p>
                                </div>
                            </div>
                        </div>';
                        }
            echo'   </div>
                </div>
            </div>
        
            <div class="centro my-5"> 
                <a href="#topo" class="botao fs-4 py-1" type="submit">Topo</a>
            </div>      
        </div>';                                
    ?>
</main>


    <?php
        //não alterar
        include 'partials/_footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
