<?php

include '../Config/Conexao.php';

$acao = $_REQUEST['acao'];
$return = array();

if($acao === "Consultar"){
    $sql = "SELECT * FROM paciente";
    $resultado = $conn->query($sql);

    if ($resultado) {
        while ($data = $resultado->fetch_assoc()) {
            $return = array(
                "nome_paciente"      => $data['nome_paciente'],
                "cpf"                => $data['cpf'],
                "telefone"           => $data['telefone'],
                "email"              => $data['email']
            );
        }
    }
}

if ($acao === "Inserir") {
    $user = json_decode(file_get_contents('php://input'));

    // verifica se nome, email e telefone existem no objeto $user
    if (isset($user->nome_paciente) && isset($user->cpf) && isset($user->telefone) && isset($user->email)) {
        $nome_paciente = $user->nome_paciente;
        $cpf = $user->cpf;
        $telefone = $user->telefone;
        $email = $user->email;

        $sql = "INSERT INTO paciente (nome_paciente, cpf, telefone, email) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ssss', $nome_paciente, $cpf, $telefone, $email);

            $resultado = $stmt->execute();

            if ($resultado) {
                $return = array("mensagem" => "Inserção realizada com sucesso.");
            } else {
                $return = array("erro" => "Falha ao inserir dados: " . $stmt->error);
            }
            $stmt->close();
        } else {
            $return = array("erro" => "Falha ao preparar a consulta.");
        }
    } else {
        $return = array("erro" => "Parâmetros nome, email e telefone não foram fornecidos corretamente.");
    }
}

if($acao === "Deletar"){
    $sql = "DELETE FROM consulta WHERE id = 3";
    $resultado = $conn->query($sql);

    if($resultado != TRUE){
        echo "Falha ao executar a consulta: " . $conn->error;
    }else{
        echo "Passou.";
    }
}

if($acao === "Atualizar"){
    $sql = "UPDATE paciente SET nome_paciente='Carlos' WHERE id=2";
    $resultado = $conn->query($sql);

    if($resultado != TRUE){
        echo "Falha.";
    }else{
        echo "Passou.";
    }
}

echo json_encode($return);
?>


