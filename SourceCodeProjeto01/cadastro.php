<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #4CAF50;
        }
        a {
            text-decoration: none;
            color: #2196F3;
        }
        a:hover {
            text-decoration: underline;
        }
        div {
            margin-top: 20px;
        }
    </style>
    
</head>
<body>
    
<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome=$_POST['nome'] ?? '';
    $email=$_POST['email'] ?? '';
    $senha=$_POST['senha'] ?? '';
    $curso=$_POST['curso'] ?? '';
    if ($nome && $email && $senha && $curso)
    {

        echo "<h1>Dados Recebidos</h1><br>";
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "senha: $senha <br>";
        echo "Curso: $curso <br>";
    } else {
        echo "Todos os Campos São Obrigatórios";
    }


    $sql = "INSERT INTO usuario (nome, email, senha, curso) VALUES ('$nome', '$email', '$senha', '$curso')";

    if (mysqli_query($conn, $sql)) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<div>
    <a href="index.html">Menu Principal</a>
</div>




</body>
</html>
