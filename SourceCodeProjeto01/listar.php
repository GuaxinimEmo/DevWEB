<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
        border: none;
    }
    a:hover {
        background-color: #ddd;
        padding: 5px;
    }
    div {
        margin-top: 20px;
    }
    table{
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
</style>
<body>
    

<?php
include 'conexao.php';


    // Consulta para listar registros
    $sql = "SELECT * FROM usuario";
    $result = mysqli_query($conn, $sql);

?>
    <h1>Consulta de Usuários</h1>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>senha</th>
                    <th>Curso</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td><a href='altera_usuario.php?id=".$row['id']."'>".$row['nome']."</a></td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['senha']."</td>";
                    echo "<td>".$row['curso']."</td>";
                    echo "<td><a href='excluir_usuario.php?id=".$row['id']."'>Excluir</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <a href="index.php">Menu Principal</a>
    </div>
</body>
</html>