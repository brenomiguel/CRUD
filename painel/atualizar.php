<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .success {
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
require('conecta.php');

// Verifica se os dados do formulário foram recebidos
if (isset($_POST['id_cliente'], $_POST['nome_cliente'], $_POST['email_cliente'], $_POST['cidade'])) {
    $id_cliente = $_POST['id_cliente'];
    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $cidade = $_POST['cidade'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE Cadastro SET nome_cliente='$nome_cliente', email_cliente='$email_cliente', cidade='$cidade' WHERE id_cliente=$id_cliente";

    echo "<div class='container ";
    if ($conexao->query($sql) === TRUE) {
        echo "success'>";
        echo "Registro com ID $id_cliente atualizado com sucesso!";
    } else {
        echo "error'>";
        echo "Erro ao atualizar registro: " . $conexao->error;
    }
    echo "<br>";
    echo "<a href='index.php'>Voltar para a página principal</a>";
    echo "</div>";

} else {
    echo "<div class='container error'>";
    echo "Dados do formulário não recebidos.";
    echo "<br>";
    echo "<a href='index.php'>Voltar para a página principal</a>";
    echo "</div>";
}
?>

</body>
</html>