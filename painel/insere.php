<?php
    session_start();
    if ((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)) {
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');

    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $cidade = $_POST['cidade'];

    $sql = "INSERT INTO cadastro
            (nome_cliente, email_cliente, cidade)
            VALUES
            ('$nome_cliente', '$email_cliente', '$cidade')
    ";

    if ($conexao->query($sql) === TRUE) {
        $id_cliente_inserido = $conexao->insert_id;  // Obtém o ID do cliente recém-inserido
        // Redireciona para a página de mensagem de sucesso
        header("Location: mensagem_sucesso.php?id=$id_cliente_inserido");
        exit(); // Certifique-se de sair para evitar que o restante do código seja executado após o redirecionamento
    } else {
        echo "Erro ao inserir registro: " . $conexao->error;
    }

    $conexao->close();
?>