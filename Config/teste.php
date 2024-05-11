<?php
$host = 'localhost'; // Altere para o seu endereço IP do servidor de banco de dados, se necessário
$username = 'root'; // Altere para o seu nome de usuário do banco de dados
$password = ''; // Altere para sua senha do banco de dados
$dbname = 'test';

// Conexão com o banco de dados usando o MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica se há erros na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}
?>
