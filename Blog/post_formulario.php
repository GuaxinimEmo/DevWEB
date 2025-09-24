<?php
//require_once 'includes/valida_login.php';
require_once 'includes/funcoes.php';
require_once 'core/conexao_mysql.php';
require_once 'core/mysql.php';
require_once 'core/sql.php';

$id = '';
$titulo = '';
$texto = '';

if (isset($_GET['id'])) {
    $id = (int)limparDados($_GET['id']);
    $criterio = [
        ['id', '=', $id]
    ];
    $retorno = buscar(
        'post',
        ['id', 'titulo', 'texto'],
        $criterio
    );
    if (count($retorno) > 0) {
        $post = $retorno[0];
        $id = $post['id'];
        $titulo = $post['titulo'];
        $texto = $post['texto'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post | Projeto para Web com PHP</title>
    <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include 'includes/topo.php'; ?>
            </div>
        </div>

        <div class="row" style="min-height: 500px;">
            <div class="col-md-2">
                <?php include 'includes/menu.php'; ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <h2>Post</h2>
                <form method="post" action="core/post_repositorio.php">
                    <input type="hidden" name="acao" value="<?php echo empty($id) ? 'inserir' : 'update'; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input class="form-control" type="text" id="titulo" name="titulo" required value="<?php echo htmlspecialchars($titulo); ?>">
                    </div>
                    <div class="form-group">
                        <label for="texto">Texto</label>
                        <textarea class="form-control" id="texto" name="texto" rows="8" required><?php echo htmlspecialchars($texto); ?></textarea>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">
                            <?php echo empty($id) ? 'Publicar' : 'Atualizar'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-md-12">
                <?php include 'includes/rodape.php'; ?>
            </div>
        </div>
    </div>
    <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>
</html>