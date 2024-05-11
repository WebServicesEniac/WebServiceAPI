<?php
include '../Config/teste.php';

// Verifica a ação a ser realizada (Consultar ou Inserir)
if (isset($_GET['acao'])) {
    if ($_GET['acao'] == 'Consultar') {
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
            $sql = "SELECT * FROM consulta WHERE email = '$email' AND senha = '$password'";
            
            // Executa a consulta
            $result = $conn->query($sql);
            
            // Verifica se há resultados
            if ($result->num_rows > 0) {
                // Usuário encontrado
                $row = $result->fetch_assoc();
                echo json_encode(array("status" => "success", "message" => "Usuário autenticado com sucesso!", "data" => $row));
            } else {
                // Usuário não encontrado
                echo json_encode(array("status" => "error", "message" => "Usuário não encontrado ou credenciais inválidas!"));
            }
        }
    } elseif ($_GET['acao'] == 'Inserir') {
        // Inserir novo usuário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmPassword'])) {
                echo json_encode(array("status" => "error", "message" => "Por favor, preencha todos os campos."));
                exit();
            }

            // Obtém os dados do formulário
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            
            // Prepara a consulta SQL para inserir o novo usuário
            $sql = "INSERT INTO consulta (nome, email) VALUES ('$name', '$email')";
            
            // Executa a consulta
            if ($conn->query($sql) === TRUE) {
                // Redireciona para a página de sucesso após o cadastro
                echo json_encode(array("status" => "success", "message" => "Usuário cadastrado com sucesso!"));
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
