<?php
    session_start();

    if(isset($_REQUEST["enviar"])){
        $nombre = $_REQUEST["nombre"];
        $pass = $_REQUEST["pass"];

        require_once("funciones.php");

        if(getUser($nombre)){
            $user = getUser($nombre);

            if($user["pass"] == $pass){

                $_SESSION["rol"] = "user";
            } else{

                header("Location: ../index.php");
                exit();
            }
        } else{
            header("Location: ../index.php");
            exit();
        }

    }
?>