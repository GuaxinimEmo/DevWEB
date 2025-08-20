<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php
include 'conexao.php';
$id=$_GET['id'] ?? '';
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

?>
    <div class="container">
        <h1>Altera Usuário</h1>
        <form action="altera_usuario_exe.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            <label for="senha">senha</label>
            <input type="number" name="senha" id="senha" value="<?php echo $row['senha']; ?>" required>
            <label for="curso">Curso:</label>
            <select name="curso" id="curso" required>
                <option value="js" <?php echo ($row['curso'] == 'js') ? 'selected' : ''; ?>>Javascript</option>
                <option value="php" <?php echo ($row['curso'] == 'php') ? 'selected' : ''; ?>>PHP</option>
                <option value="py" <?php echo ($row['curso'] == 'py') ? 'selected' : ''; ?>>Python</option>
            </select>

            <button type="submit">Alterar</button>
            <button type="button" onclick="window.location.href='listar.php'">Voltar</button>
        </form>
    </div>
<?php
mysqli_close($conn);
?>
</body>
</html>