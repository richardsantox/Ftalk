<!doctype html>
<html lang="pt-br">
  <head> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FTalk: Seu fórum sobre games</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="<script src="https://kit.fontawesome.com/95e4277467.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Fredoka+One&family=IBM+Plex+Mono:wght@500&family=Luckiest+Guy&family=Passion+One&family=Press+Start+2P&family=Righteous&family=Rubik:wght@300&family=Russo+One&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
   
  </head>

  <body>
<?php
    include 'partials/_header.php';
    include 'partials/_dbConnection.php';
?>

  <main class="nao-entra usuarios">
    <div class="container fonte centro ">
      <?php

      
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          //basicamente aqui são os níveis possíveis de acesso!
          $idUser = $_SESSION['idUser'];
          $sql = "SELECT *  FROM `user` WHERE idUser = '$idUser'"; 
          $result = mysqli_query($connection, $sql);
          $noResult = true;

          while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $auth = $row['auth'];
            $nomeComom = $row['nomeUser'];
            $email = $row['emailUser'];
            $idU = $row['idUser'];
            $_SESSION['auth'] = $auth;
            

            if($auth == "common_user"){
             // echo 'página do usuário comum';
               echo'
                  <div class="row">
                    <div class="col-md-8 perfil">
                    <img src="img/defaultuser.jpg" width="14%" class="m-1 img-fluid" alt="Imagem de usuário padrão">
                    <h3 class="m-2"> '.$nomeComom.' </h3>
                    <h4 class="m-4"> '.$email.' </h4>
                    <div class="mb-1">'
                  ?>
                      <a class="btn cor-botoes btn " href="partials/_formUpdate.php?idU=<?php echo $idU; ?>"  role="button">Editar conta</a>
                      <a class="btn btn-danger btn " href="javascript: if(confirm('Tem certeza que deseja deletar sua conta <?php echo $nomeComom; ?> ?'))
                      location.href='partials/_deleteUser.php?idU=<?php echo $idU; ?>';"  role="button">Excluir conta</a>
                  <?php
                    echo'</div>

                    </div>
                    <div class="col-md-4">
                      <div class="pricing animated swing my-5">
                        <div class="thumbnail">
                          <div class="fa fa-paper-plane"><img src="img/coroa.png" class="img-premium"></div>
                        </div>

                        <div class="mt-4">
                          Tenha a conta premium
                        </div>

                        <div class="title">
                          Ftalk Plus
                        </div>
    
                        <div class="content" style="display: block;">
                          <div class="sub-title">
                            R$20
                          </div>
                          <ul>
                            <li>
                              <div class="fa fa-check"></div>
                              Altera foto de perfil
                            </li>
                            <li>
                              <div class="fa fa-check"></div>
                              Posts prioritários
                            </li>
                            <li>
                              <div class="fa fa-check"></div>
                              Posts ilimitados
                            </li>
                            <li>
                              <div class="fa fa-close"></div>
                              Sem propagandas
                            </li>
                          </ul>
                          <a href="#" class="fs-6">
                            Atualizar
                          </a>
                        </div>
    
                        <div class="clickMe">
                          Click
                        </div>
                      </div>

                      </div>
                    </div>
                  </div>';



            }elseif ($auth == "admin"){

              $sql = "SELECT * FROM `user`"; 
              $result = mysqli_query($connection, $sql);
              $noResult = true;
                
              echo'<div class="container-fluid fonte-2">
                <div class="row">
                  <div class="col-md-3 mt-2">
                    <div class="container-fluid border border-primary">
                      <img src="img/defaultuser.jpg" width="25%" class="m-3 img-fluid" alt="Imagem de usuário padrão">
                      <!-- variavel $nome vem quando o usuário loga-->
                      <h5>'.$nome.'</h5>
                    </div>
                  </div>
                  <div class="col-md-9 mt-2">
                    <div class="container border border-primary">
                      <table class="table table-sm">
                      <caption>Lista de usuários</caption>
                        <thead>
                          <tr class="fonte">
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Perminssão</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>';

                          while($row = mysqli_fetch_assoc($result)){
                            $noResult = false;
                            $usarios = $row['nomeUser'];
                            $permissao = $row['auth'];
                            $id = $row['idUser'];

                             echo'<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$usarios.'</td>
                                    <td>
                                      '.$permissao.'
                                    </td>
                                    <td>';
                                ?>

                                      <a class="btn cor-botoes btn-sm m-1" href="partials/_formUpdate.php?id=<?php echo $id; ?>"  role="button">Alterar</a>
                                      <a class="btn btn-danger btn-sm " href="javascript: if(confirm('Tem certeza que deseja deletar <?php echo $usarios; ?> ?'))
                                      location.href='partials/_deleteUser.php?id=<?php echo $id; ?>';"  role="button">Excluir</a>

                                <?php
                                echo'   
                                  </td>
                                </tr>';
                          }
                   echo'</tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>';


            }else{
              echo 'erro! Contate um administrador';
            }
          }
        };
      ?>
    </div>
  </main>


<?php
    //não alterar
    include 'partials/_footer.php';
?>
    <script>
      $( ".title" ).click(function() {
        $(".content").slideToggle();
      });
    </script>
    <script src="js/subscribe.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
