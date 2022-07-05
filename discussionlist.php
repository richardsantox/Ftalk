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

    $id = $_GET['catid'];

    $sql = "SELECT * FROM `categorias` WHERE idCategoria=$id"; 
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($result)){
       $nomeCategoria = $row['nomeCategoria'];
       $descCategoria = $row['descCategoria'];
    };




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
        <div class="container my-5">
            <div class="jumbotron1">
                <div class="ms-5">
                    <h1 class="display-3"><?php /*cuidado quando for alterar isto */ echo $nomeCategoria; ?></h1>
                    <p class="lead fs-5 fst-italic">Bem vindo. <?php echo $descCategoria; ?></p>
                </div>
                <hr class="my-4 linha rounded-pill">
            </div>
        </div> 
<?php
        //não alterar este if
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            //pode alterar
            echo'<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="container">
                                <div class="card ">
                                    <div class="card-body border border-info rounded-2">
                                        <h3 class="py-2">Crie sua discussão</h3>
                                        <form action="'./* NÃO ALTERAR  ESTA LINHA*/ $_SERVER["REQUEST_URI"] . '" method="POST">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Título da Discussão</label>
                                                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Digite aqui o texto de sua Discussão</label>
                                                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn cor-botoes ">Enviar nova Discussão</button>
                                        </form>
                                    </div>
                                </div>';
?>
                                <div class="container my-4" id="ques">
                                    <h1 class="py-2">Fórum</h1>
                                    <?php
                                        //Não alterar este começo
                                        $id = $_GET['catid'];

                                        $sql = "SELECT * FROM `discussao` WHERE id_cat_Disc=$id"; 
                                        $result = mysqli_query($connection, $sql);
                                        $noResult = true;
                                        

                                            while($row = mysqli_fetch_assoc($result)){
                                            $noResult = false;
                                            $tituloDisc = $row['tituloDisc'];
                                            $descDisc = $row['descDisc'];
                                            $id = $row['idDisc'];
                                            
                                            $userid = $row['id_user_Disc'];
                                            $sql2 = "SELECT nomeUser FROM `user` Where idUser='$userid'";
                                            $result2 = mysqli_query($connection, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            $nome = isset($row2['nomeUser']) ? $row2['nomeUser'] : "Usuário Desativado";
                                                    
                                               
                                                                              
                                            if($noResult){
                                                // pode alterar esta parte
                                                echo "<b> Seja o primeiro a postar algo nesta categoria!</b>";
                                            }else{
                                                //p pode alterar esta parte
                                                echo'<div class="card border border-info rounded-2 mb-2">
                                                        <div class="d-flex my-1 card-header">
                                                            <img src="img/defaultuser.jpg" width="34px" height="34px class="me-1 img-fluid" alt="Imagem de usuário padrão">
                                                            <p class="card-text fs-6"> Criador do tópico: <strong>'.$nome.'</strong></p>
                                                        </div> 
                                                        <div class="card-body">
                                                            <h4><a class="text-dark" href="discussion.php?catid='/* não alterar o href */ . $id . '">' . $tituloDisc . '</a></h4>
                                                            <p class="card-text fs-6 m-1">' . $descDisc . '</p>
                                                        </div>
                                                    </div>';
                                                }
                                            };
                                    ?>     
                                </div>
<?php             echo' </div>
                        </div>
                        <div class="col-md-4 d-none d-md-block">
                            <div class="container">
                                <div class="card card-regras centro">
                                    <div class="card-body">
                                        <p class="card-text fs-6">Este fórum é para discussão de tópicos sobre ';  echo $nomeCategoria; echo'neste caso, respeite a opinião de todos e não desrespeite qualquer tipo de <a href="#" class="text-decoration-none cor-regras">regras.</a></p>
                                    </div>
                                </div>';
        
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
                                    $nomeCat = $row['nomeCategoria'];
                                    $desc = $row['descCategoria'];
            
                                    //pode alterar, com excessão da imagem, falar comigo antes de alterar ela.
                                    echo'<div class="col md-4 m-3">
                                            <div class="card card-direita centro ">
                                                <!--Insira as imagens dos cards aí em baixo-->
                                                <img src="img/Categorias/'. /* cat-$nome.jpeg tomar cuidado - img video 52 at 10:00*/$nomeCat .'.jpg" class="card-img-top card-img-posicao " alt="...">
                                                <div class="card-body">
                                                    <h4 class="card-title "><a class="card-titulo" href="discussionlist.php?catid=' . $idCat . '">' . $nomeCat . '</a></h4>
                                                    <p class="card-text text-white fs-6">' . $desc . '</p>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                echo'
                            </div>
                        </div>
                    </div>
                    
                    <div class="centro my-5"> 
                        <a href="#topo" class="botao fs-4 py-1" type="submit">Topo</a>
                    </div>  
                </div>';
        }else{
        echo '<div class="container alerta" >
                <h1 class="py-2">Crie sua discussão</h1>
                <div class="alert alert-danger" role="alert">
                    Você deve estar logado para poder criar um tópico!
                </div>
            </div>';
        }
?>
    </main> 

<?php
    //não alterar
    include 'partials/_footer.php';
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
