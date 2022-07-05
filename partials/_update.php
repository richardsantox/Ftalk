<?php
session_start();
include '_dbConnection.php';

if($_SESSION['auth'] == "common_user"){

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome_update = filter_input(INPUT_POST, 'nomeUser', FILTER_SANITIZE_STRING);

    $result_user = "UPDATE user SET nomeUSer='$nome_update' WHERE idUSer='$id'";
    $result = mysqli_query($connection, $result_user);

        if(mysqli_affected_rows($connection)){
            echo "alteração feita";
            header("Location:/ftalk/user.php");
        }else{
            echo"<p>Falha na alteração</p>";
            header("Location:/ftalk/partials/_formAuth.php?id=$id");
        }
}elseif($_SESSION['auth'] == "admin"){

    $idT = filter_input(INPUT_POST, 'idT', FILTER_SANITIZE_NUMBER_INT);
    $permissao = filter_input(INPUT_POST, 'permissao', FILTER_SANITIZE_STRING);
    
    $result_user = "UPDATE user SET auth='$permissao' WHERE idUSer='$idT'";
    $result = mysqli_query($connection, $result_user);

        if(mysqli_affected_rows($connection)){
            echo "alteração feita";
            header("Location:/ftalk/user.php");
        }else{
            echo"<p>Falha na alteração</p>";
            header("Location:/ftalk/partials/_formAuth.php?id=$id");
        }
}
?>