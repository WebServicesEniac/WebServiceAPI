<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odonto</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="icon" type="image/png" href="./assets/img/logo_odonto.webp">
</head>
<body class="centralize">
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="login">
            <form class="form" id="loginForm" method="post" action="../Api/login.php?acao=Consultar">
                <label for="chk" aria-hidden="true">Login</label>
                <input class="input" type="email" name="email" id="loginEmail" placeholder="E-mail" required="">
                <input class="input" type="password" name="senha" id="loginPassword" placeholder="Senha" required="">
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="register">
            <form class="form" id="registerForm" method="post" action="../Api/cadastro.php?acao=Inserir">
                <label for="chk" aria-hidden="true">Cadastrar</label>
                <input class="input" type="text" name="nome" id="registerName" placeholder="Nome Completo" required="">
                <input class="input" type="email" name="email" id="registerEmail" placeholder="E-mail" required="">
                <input class="input" type="password" name="senha" id="registerPassword" placeholder="Senha" required="">
                <input class="input" type="password" name="confSenha" id="confirmPassword" placeholder="Confirmar senha" required="">
                <button type="submit">Cadastrar-se</button>
            </form>
        </div>
    </div>

    <script>

    document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Impede o envio do formulário padrão
    // Obtém os valores dos campos de registro
    var email = document.getElementById("loginEmail").value;
    var senha = document.getElementById("loginPassword").value;
    
    // Faz uma solicitação AJAX para a API de registro
    fetch("../Api/cadastro.php?acao=Consultar", {
        method: "POST",
        body: new FormData(document.getElementById("loginForm"))
    }).then(response => response.json()).then(data => {
        // Manipula os dados retornados pela API
        console.log(data);
        if (data.status === "success") {
            window.location.href = "./view/home/index.php"; // Redireciona para a página home
        } else {
            alert(data.message); // Exibe mensagem de erro
        }
    }).catch(error => {
        console.error('Erro ao fazer solicitação:', error);
    });
});

        document.getElementById("registerForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Impede o envio do formulário padrão
            // Obtém os valores dos campos de registro
            var name = document.getElementById("registerName").value;
            var email = document.getElementById("registerEmail").value;
            var password = document.getElementById("registerPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            // Verifica se as senhas coincidem
            if (password !== confirmPassword) {
                alert("As senhas não coincidem!");
                return;
            }
            // Faz uma solicitação AJAX para a API de registro
            fetch("../Api/cadastro.php?acao=Inserir", {
                method: "POST",
                body: new FormData(document.getElementById("registerForm"))
            }).then(response => response.json()).then(data => {
                // Manipula os dados retornados pela API
                console.log(data);
                if (data.status === "success") {
                    window.location.href = "./view/home/index.php"; // Redireciona para a página home
                } else {
                    alert(data.message); // Exibe mensagem de erro
                }
            }).catch(error => {
                console.error('Erro ao fazer solicitação:', error);
            });
        });
    </script>
</body>
</html>
