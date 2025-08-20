<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'conexao.php';
    session_start();
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    print_r($row);
    if($row['senha'] == $senha){
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $row['nome'];
        header("Location: index.php"); //pesquisar oq raios isso faz
    } else {
        echo "Usuário ou senha inválidos";
    }
    mysqli_close($conn);

    $_SESSION['user'] = $row['nome'];
    ?>
    <a href="listar.php">Voltar</a>
</body>
</html>