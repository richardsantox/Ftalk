<?php
session_start(); 
    include '_dbConnection.php';

    if($_SESSION['auth'] == "admin"){

        $idDeleteAdm = intval($_GET['id']);
        $sql = "SELECT * FROM user WHERE idUser = $idDeleteAdm";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $permissao = $row['auth'];

            if($permissao == "admin"){
                echo"<script>
                        alert('Impossivel excluir contas de administradores, ser for necessário troque a permissão do usuário e tente novamente')
                        location.href='/ftalk/User.php';
                    </script>";
            }else{
                $sql = $connection->prepare("DELETE FROM user WHERE idUser = '$idDeleteAdm'");
                $sql->execute();
            }


        if($sql)
            echo "
            <script>
                location.href='/ftalk/User.php';
            </script>";
        else 
        echo "
        <script> 
            alert('Não foi possível deletar o usuário.')
            location.href='/ftalk/User.php';
        </script>";

    }elseif($_SESSION['auth'] == "common_user"){

        $idDeleteUser = intval($_GET['idU']);
        $sql = $connection->prepare("DELETE FROM user WHERE idUser = '$idDeleteUser'");
        $sql->execute();

        if($sql)
            echo "
            <script>
                location.href='/ftalk/partials/_logout.php';
            </script>";
        else 
        echo"
        <script> 
            alert('Não foi possível deletar sua conta.')
            location.href='/ftalk/User.php';
        </script>";
    }
?>

