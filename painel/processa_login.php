<?php
    session_start();
    require('conecta.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $senha = md5($senha);


    $consulta = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    $resultado = $conexao->query($consulta);
    $registros = $resultado->num_rows;
    $resultado_usuario = mysqli_fetch_assoc($resultado);
    var_dump($resultado_usuario);

    if($registros<>0){
        //echo "TE ACHEI";
        $_SESSION['id'] = $resultado_usuario['id'];
        $_SESSION['nome'] = $resultado_usuario['nome'];
        $_SESSION['email'] = $resultado_usuario['email'];

        header('Location: index.php');

    }
    else{
        //echo "NÃO ACHEI";
        header('Location: ../index.html');
    }
?>