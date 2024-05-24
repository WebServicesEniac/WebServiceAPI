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
                <form id="consultaAgendamentos" method="GET" action="http://localhost/Consultav2.php?acao=Consultar">
                    <label>Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome Completo">
                    
                    <label>E-mail</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" >
                    
                    <label>WhatsApp</label>
                    <input type="text" name="whatsapp" id="whatsapp" placeholder="Digite seu WhatsApp">
                    <br>
                    <br>
                    <button id="consultarButton" class="button" type="button">Consultar Agendamentos</button>
                </form>
            </main>
            <aside>
                <img src="../../assets/img/odonto.jpg" alt="Odonto" height="500px" width="550vh">
            </aside>
        </div>
        <section>
            <div id="jsonResponse"></div>
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

        <pre id="content"></pre>

       
    </table>
    </footer>
    <script>
       

        // document.getElementById('consultaAgendamentos').addEventListener('submit', function(event){

                    
        //     // URL da API
        //     const url = 'http://localhost/Consultav2.php?acao=Consultar';

        //     // Fazendo uma requisição GET
        //     fetch(url)
        //     .then(response => {
        //         // Verifica se a resposta é bem-sucedida
        //         if (!response.ok) {
        //         throw new Error('Error na requisição ' + response.statusText);
        //         }
        //         // Converte a resposta para JSON
        //         return response.json();
        //     })
        //     .then(data => {
        //         // Manipula os dados recebidos
        //         console.log(data);
        //     })
        //     .catch(error => {
        //         // Trata erros que possam ter ocorrido durante a requisição
        //         console.log('Erros durante a requisição', error);
        //     });
        // })    

        const button = document.getElementById('consultarButton');

        const fetchApi = (value) =>{
            const result = fetch('http://localhost/Consultav2.php?acao=Consultar')
            .then((res) =>res.text())
            .then((data)=>{
                // console.log(data)
                const pacientes = data
                const objeto = pacientes[0]
                console.log(objeto)
                
            })
        }

        fetchApi(1)
       
        button.addEventListener('click', function(event){
        event.preventDefault()
        
       })



        

        

    </script>
</body>
</html>