<?php
//Não alterar NADA daqui sem perguntar para mim xd
$showerror = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include '_dbConnection.php';
    $nomeUser = $_POST['nomeUser'];
    $emailUser = $_POST['signupEmail'];
    $senhaUser = $_POST['signupPass'];
    $signupConfirm = $_POST['signupConfirm'];

    $existSql = "select * from `user` where emailUser = '$emailUser'";
    $result = mysqli_query($connection, $existSql);
    $numRows = mysqli_num_rows($result);

    if($numRows>0){
        $showError = "Email já cadastrado!";
    }else{
        if($senhaUser == $signupConfirm){
            $hash = password_hash($senhaUser, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`nomeUser`, `emailUser`, `senhaUser`, `timestamp`, `auth`) VALUES ('$nomeUser', '$emailUser', '$hash', current_timestamp(), 'common_user')";
            $result = mysqli_query($connection, $sql);

            if($result){
                $showAlert = true;
                header("Location: /ftalk/index.php?signupsuccess=true");      
                exit();
            }
        }else{
            $showError = "Senhas não estão iguais!";
            
        }
    }
    header("Location: /ftalk/index.php?signupsuccess=false&error=$showError");
}

?>