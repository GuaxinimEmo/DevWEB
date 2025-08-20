<?php
session_start();
echo "Sessão iniciada com sucesso!";

$_SESSION['user'] = 'John Doe';
$_SESSION['useremail'] = 'abababa@gmaicom';

echo "Usuário: " . $_SESSION['user'] . "<br>";

echo '<br><a href="sessao2.php">Ir para a página 2</a>';

echo '<br>Id sessao ' . session_id();


?>