<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FTalk: Seu fórum sobre games</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Fredoka+One&family=IBM+Plex+Mono:wght@500&family=Luckiest+Guy&family=Passion+One&family=Press+Start+2P&family=Righteous&family=Rubik:wght@300&family=Russo+One&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body class="body-update">

<?php
    session_start();
    include '_dbConnection.php';
    

    if($_SESSION['auth'] == "common_user"){

        $usu_codigo = intval($_GET['idU']) ;

        $sql = "SELECT * FROM user WHERE idUser = '$usu_codigo'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);

        $email = $row['emailUser'];
        $nome_bd = $row['nomeUser'];
    
        echo' <main class="fonte">
                <div class="card form-update card-form">
                        <div class="card-body">
                            <h5 class="card-title text-center">Edite sua conta</h5>
                            <form action="/Ftalk/partials/_update.php " method="POST">
                                <div class="modal-body">
                                <input type="hidden" value="'.$usu_codigo.'" name="id">
                                
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nome de usuário</label>
                                        <input type="text" class="form-control" value="'.$nome_bd.' "name="nomeUser" aria-describedby="emailHelp">
                                    </div>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn cor-botoes px-3 centro">Salvar</button>
                                    <a class="btn btn-danger centro" href="/ftalk/user.php" role="button">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>';

    }elseif($_SESSION['auth'] == "admin"){

        $idT = intval($_GET['id']);

        echo'<main class="fonte">
                <div class="card form-update card-form">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edite a permissão do usuário '.$idT.'</h5>
                        <form action="/Ftalk/partials/_update.php" method="POST">
                            <input type="hidden" value="'.$idT.'" name="idT">

                            <label for="permissao">Conceder permissão de: </label>
                            <select class="form-select" name="permissao" aria-label="Default select example">
                                <option disabled>Selecione</option>
                                <option value="admin">Administrador</option>
                                <option value="common_user">Usuário comun</option>
                            </select>

                            <div class="modal-footer">
                                <input type="submit" value="Salvar" class="btn cor-botoes px-3 centro"></input>
                                <a class="btn btn-danger centro" href="/ftalk/user.php" role="button">Cancelar</a>  
                            </div>
                        </form>
                    </div>
                </div>
            </main>';

    }
?>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>

        