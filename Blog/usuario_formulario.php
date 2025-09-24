<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário | Projeto para Web com PHP</title>
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
                <?php 
                 require_once 'includes/funcoes.php';
                 require_once 'core/conexao_mysql.php';
                 require_once 'core/mysql.php';
                 require_once 'core/sql.php'; 

                 $id = '';
                 $nome = '';
                 $email = '';

                 if(isset($_SESSION['login'])) {
                    $id = (int) $_SESSION['login']['usuario']['id'];
                    $criterio = [
                        ['id', '=', $id]
                    ];
                    $retorno = buscar(
                        'usuario',
                        [
                            'id',
                            'nome',
                            'email'
                        ],
                        $criterio
                    );
                    if(count($retorno) > 0) {
                        $entidade = $retorno[0];
                        $id = $entidade['id'];
                        $nome = $entidade['nome'];
                        $email = $entidade['email'];
                    }
                 }
                ?>
                <h2>Usuário</h2>
                <form method="post" action="core/usuario_repositorio.php">
                    <input type="hidden" name="acao"
                            value="<?php echo empty($id) ? 'inserir' : 'update'; ?>">
                    <input type="hidden" name="id"
                            value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" 
                               required id="nome" name="nome"
                               value="<?php echo htmlspecialchars($nome); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" type="email" 
                               required id="email" name="email"
                               value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input class="form-control" type="password" 
                               id="senha" name="senha" <?php echo empty($id) ? 'required' : ''; ?>>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">
                            <?php echo empty($id) ? 'Cadastrar' : 'Atualizar'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php include 'includes/rodape.php'; ?>
            </div>
        </div>
    </div>
    <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>
</html>