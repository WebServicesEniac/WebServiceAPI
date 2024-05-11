<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odonto</title>
    <link rel="stylesheet" href="../home/index.css">
    <link rel="icon" type="image/png" href="../../assets/img/logo_odonto.png">
</head>
<body>
    <nav>
        <ul class="menu">
            <li>
                <a href="../home/index.html"><img src="../../assets/img/logo_odonto.png" alt="logo_odonto" height="50px" width="50px"></a>
            </li>
            <li><a href="../home/funcionalidade/">Funcionalidade ☟</a>
                <ul>
                    <li><a href="#">Agenda Digital</a></li>
                    <li><a href="#">Gestão Financeira</a></li>
                    <li><a href="#">Marketing Odonto</a></li>
                    <li><a href="#">Prontuário Eletrônico</a></li>
                    <li><a href="#">Harmonização Orofacial</a></li>
                </ul>
            </li>
            <li><a href="../home/planos/index.html">Planos</a></li>
            <li><a href="../home/parceiros/index.html">Parceiros</a></li>
            <li><a href="../home/blog/index.html">Blog</a></li>
            <li><a href="../home/sobre_nos/index.html">Sobre Nós</a></li>
        </ul>
    </nav>
    <div>
        <div>
            <main>
                <h2>Gerenciamento de Consulta Odontológicas</h2>
                <p>Com Dental Office suas dores nossas soluções!</p>
                <p>Gestão financeira, agenda online, prontuário odontológico e mais em um software odontológico integrado e fácil de usar.</p>
                <form id="consultaAgendamentos" method="post" action="../Api/teste.php?acao=Consultar">
                    <label for="nome">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome Completo" required="">
                    
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" required="">
                    
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" name="whatsapp" id="whatsapp" placeholder="Digite seu WhatsApp">
                    <br>
                    <br>
                    <a href="" class="button" type="submit">Consultar Agendamentos</a>
                </form>
            </main>
            <aside>
                <img src="../../assets/img/odonto.jpg" alt="Odonto" height="500px" width="550vh">
            </aside>
        </div>
        <section>

        </section>
    </div>
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Dental Office. Todos os direitos reservados.</p>
            <p>
                Siga-nos nas redes sociais:
                <a href="#" aria-label="Facebook Dental Office"><img src="../../assets/img/facebook.png" alt="Facebook" height="20" width="20"></a>
                <a href="#" aria-label="Instagram Dental Office"><img src="../../assets/img//instagram.png" alt="Instagram" height="20" width="20"></a>
                <a href="#" aria-label="Twitter Dental Office"><img src="../../assets/img/twitter.png" alt="Twitter" height="20" width="20"></a>
            </p>
            <p>Contato: <a href="mailto:suporte@dentaloffice.com">suporte@dentaloffice.com</a></p>
        </div>
    </footer>
    <script>
        document.getElementById("consultaAgendamentos").addEventListener("submit", function(event) {
            event.preventDefault(); // Impede o envio do formulário padrão
            // Obtém os valores dos campos de registro
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            
            // Faz uma solicitação AJAX para a API de registro
            fetch("../Api/teste.php?acao=Inserir", {
                method: "POST",
                body: new FormData(document.getElementById("consultaAgendamentos"))
            }).then(response => response.json()).then(data => {
                // Manipula os dados retornados pela API
                console.log(data);
                if (data.status === "success") {
                    window.location.href = "../agendamento/index.html"; // Redireciona para a página de consulta
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