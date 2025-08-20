<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterracao do Usuario</title>
</head>
<body>
    <?php   
    include 'conexao.php';
    $id = $_POST['id'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $curso = $_POST['curso'] ?? '';
    echo "<h1>Dados Recebidos</h1><br>";
    echo "ID: $id <br>";    
    echo "Nome: $nome <br>";
    echo "Email: $email <br>";
    echo "senha: $senha <br>";
    echo "Curso: $curso <br>";
    if ($nome && $email && $senha && $curso) {
        echo "<h2>Alterando usuário...</h2>";
    } else {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    $sql = "UPDATE usuario SET nome='$nome', email='$email', senha='$senha', curso='$curso' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Usuário alterado com sucesso!";
    } else {
        echo "Erro ao alterar usuário: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
    <div>
        <a href="listar.php">Voltar para a lista de usuários</a>
    </div>
</body>
</html>