<?php
    //Não alterar NADA daqui sem perguntar para mim xd
    $showerror = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbConnection.php';
        $nomeUser = $_POST['nomeUser'];
        $senhaUser = $_POST['senhaUser'];

        $sql = "Select * from user where nomeUser='$nomeUser'";
        $result = mysqli_query($connection, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows==0){
            echo"<script>
                    alert('Conta não encontrada, verifique seu email e sua senha.')
                    location.href='../index.php';
                </script>";
           
        }else{
            if($numRows==1){
                $row = mysqli_fetch_assoc($result);
                    if(password_verify($senhaUser, $row['senhaUser'])){
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['idUser'] = $row['idUser'];
                        $_SESSION['nomeUser'] = $nomeUser;
                        $_SESSION['auth'] = $auth;

                        echo "logged in";

                    }
                        header("Location: ../index.php");
                
            
             }
        }

    }

?>