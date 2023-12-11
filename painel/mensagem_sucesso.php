<?php
session_start();

$id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : null;

if ((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)) {
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    header('Location: ../index.html');
}
require('conecta.php');
include_once('cabecalho.php');
?>

<div class="content mt-3">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Sucesso</span> <?php echo "Registro com ID $id_cliente inserido com sucesso!"; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-12">
        <a href='index.php' class='btn btn-primary'>Voltar para a página principal</a>
    </div>
</div> <!-- .content -->
</div><!-- /#right-panel -->

<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>

</html>