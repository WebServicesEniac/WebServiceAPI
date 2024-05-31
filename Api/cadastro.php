<?php
$host = 'localhost';
$username = 'root'; 
$password = ''; // Senha do banco de dados
$dbname = 'smile_time';

// Conexão com o banco de dados usando o MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica se há erros na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica a ação a ser realizada (Consultar ou Inserir)
if (isset($_GET['acao'])) {
    if ($_GET['acao'] == 'Consultar') {
        // Consultar usuário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['email']) || empty($_POST['senha'])) {
                echo json_encode(array("status" => "error", "message" => "Por favor, preencha todos os campos."));
                exit();
            }

            // Obtém os dados do formulário
            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['senha']);
            
            // Prepara a consulta SQL para verificar o usuário
            $sql = "SELECT * FROM cadastro WHERE email = '$email' AND senha = '$password'";
            
            // Executa a consulta
            $result = $conn->query($sql);
            
            // Verifica se há resultados
            if ($result->num_rows > 0) {
                // Usuário encontrado
                $row = $result->fetch_assoc();
                echo json_encode(array("status" => "success", "message" => "Usuário autenticado com sucesso!", "data" => $row));
                header('Location: ../odonto/home/index.php');
                echo "Deu certo";
            } else {
                // Usuário não encontrado
                echo json_encode(array("status" => "error", "message" => "Usuário não encontrado ou credenciais inválidas!"));
            }
        }
    } elseif ($_GET['acao'] == 'Inserir') {
        // Inserir novo usuário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['confSenha'])) {
                echo json_encode(array("status" => "error", "message" => "Por favor, preencha todos os campos."));
                exit();
            }

            // Obtém os dados do formulário
            $name = $conn->real_escape_string($_POST['nome']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['senha']);
            $confirmPassword = $conn->real_escape_string($_POST['confSenha']);

            // Verifica se as senhas coincidem
            if ($password != $confirmPassword) {
                echo json_encode(array("status" => "error", "message" => "As senhas não coincidem!"));
                exit();
            }

            // Insere o novo usuário
            $sql = "INSERT INTO cadastro (nome, email, senha) VALUES ('$name', '$email', '$password')";

            // Executa a consulta
            if ($conn->query($sql) === TRUE) {
                // Redireciona para a página de sucesso após o cadastro
                echo json_encode(array("status" => "success", "message" => "Usuário cadastrado com sucesso!"));
                header('Location: ./view/home/index.php');
            } else {
                echo json_encode(array("status" => "error", "message" => "Erro ao cadastrar usuário: " . $conn->error));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Ação inválida."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Ação não especificada."));
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
