<?php
    //Não alterar esta parte
    session_start();
    echo "Loggin you out. Wait please...";

    session_destroy();

    header("Location: /ftalk");

?>