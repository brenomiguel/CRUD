<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Registro</title>
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
// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    // Conecta ao banco de dados (substitua pelos seus dados de conexão)
    $conexao = new mysqli("localhost", "root", "", "empresa");

    // Verifica se a conexão foi bem-sucedida
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Prepara a consulta SQL para excluir o registro com o ID fornecido
    $sql = "DELETE FROM Cadastro WHERE id_cliente = $id_cliente";

    // Executa a consulta
    if ($conexao->query($sql) === TRUE) {
        echo "<div class='container success'>";
        echo "Registro com ID $id_cliente excluído com sucesso!";
        echo "<br>";
        echo "<a href='index.php'>Voltar para a página principal</a>";
        echo "</div>";
    } else {
        echo "<div class='container error'>";
        echo "Erro ao excluir registro: " . $conexao->error;
        echo "<br>";
        echo "<a href='index.php'>Voltar para a página principal</a>";
        echo "</div>";
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    echo "<div class='container error'>";
    echo "ID não fornecido na URL.";
    echo "<br>";
    echo "<a href='index.php'>Voltar para a página principal</a>";
    echo "</div>";
}
?>

</body>
</html>