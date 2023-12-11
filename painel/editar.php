<?php
session_start();
if ((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)) {
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    header('Location: ../index.html');
}

require('conecta.php');

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];

    // Recupera os dados do cliente com base no ID
    $sql = "SELECT * FROM Cadastro WHERE id_cliente = $id_cliente";
    $consulta = $conexao->query($sql);

    if ($consulta->num_rows > 0) {
        $linha = $consulta->fetch_assoc();
        $nome_cliente = $linha['nome_cliente'];
        $email_cliente = $linha['email_cliente'];
        $cidade = $linha['cidade'];
    } else {
        echo "Cliente não encontrado.";
        exit();
    }
} else {
    echo "ID não fornecido na URL.";
    exit();
}

include_once('cabecalho.php');
?>

<div class="content mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Editar Cliente</strong>
            </div>
            <div class="card-body">
                <form action="atualizar.php" method="post">
                    <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
                    <div class="form-group">
                        <label for="nome_cliente">Nome:</label>
                        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?php echo htmlspecialchars($nome_cliente); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email_cliente">Email:</label>
                        <input type="email" class="form-control" id="email_cliente" name="email_cliente" value="<?php echo htmlspecialchars($email_cliente); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo htmlspecialchars($cidade); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

