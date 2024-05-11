<?php
// Configurações do banco de dados
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';

// Conexão com o banco de dados usando o MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica se há erros na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica a ação a ser realizada (Consultar)
if (isset($_GET['acao']) && $_GET['acao'] == 'Consultar') {
    // Consultar usuário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se os campos foram preenchidos
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo json_encode(array("status" => "error", "message" => "Por favor, preencha todos os campos."));
            exit();
        }

        // Obtém os dados do formulário
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        
        // Prepara a consulta SQL para verificar o usuário
        $sql = "SELECT * FROM paciente WHERE email = '$email' AND senha = '$password'";
        
        // Executa a consulta
        $result = $conn->query($sql);
        
        // Verifica se há resultados
        if ($result->num_rows > 0) {
            // Usuário encontrado
            $row = $result->fetch_assoc();
            echo json_encode(array("status" => "success", "message" => "Usuário autenticado com sucesso!", "data" => $row));
            // Iniciar sessão e redirecionar para a página designada
            session_start();
            $_SESSION['email'] = $email;
            header("Location: ../odonto/view/home/index.php");
            exit();
        } else {
            // Usuário não encontrado
            echo json_encode(array("status" => "error", "message" => "Usuário não encontrado ou credenciais inválidas!"));
        }
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
