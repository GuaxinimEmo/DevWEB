<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="css/estilo.css">
    
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        echo "<h1>Bem-vindo, " . $_SESSION['user'] . "!</h1><br>";
    } else {
        echo "<h1>Sem User conectado</h1><br>";
    }
    ?>
    <br>
    <div id="menu">
            <h2>Menu Principal</h2>
        <ul>
            <li><a href="cadastro.html"><button>Cadastro</button></a></li>
            <li ><a href="listar.php"><button>Listar Cadastrados</button></a></li>
            <li><a href="login.html"><button>Login</button></a></li>
            <li><a href="logout.php"><button>Logout</button></a></li>
        </ul>
    </div>

</body>
</html>