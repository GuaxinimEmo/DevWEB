<?php
$servername = "localhost";
$username = "root";
$password = "231205";
$dbname = "projeto01";
$port = 3306; // Porta padrão do MySQL, se necessário

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}