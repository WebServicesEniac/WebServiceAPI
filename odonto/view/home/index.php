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
            <!-- <div id="jsonResponse"></div> -->
            <table id="resultList" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <!-- Linhas serão inseridas aqui dinamicamente -->
        </tbody>
    </table>
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

        <ul id="resultList"></ul>

       
    </table>
    </footer>
    <script> 

        const button = document.getElementById('consultarButton');
        const resultList = document.getElementById('resultList');
        const nome = document.getElementById('name')
        const email = document.getElementById('email')
        const whatsapp = document.getElementById('whatsapp')

        const fetchApi = (value) =>{
            const result = fetch('http://localhost/Consultav2.php?acao=Consultar')
            .then((res) =>res.text())
            .then((data)=>{
                // console.log(data)
                const obj = JSON.parse(data);
                const pacientes = obj[0];
                console.log(pacientes);

                // Transforme a estrutura
                const novoFormato = pacientes.reduce((acc, item) => {
                    acc[item.id] = item;
                    return acc;
                }, {});

                // // Converta de volta para JSON (se necessário)
                // const novoJson = JSON.stringify(novoFormato, null, 4);

                const tbody = resultList.querySelector('tbody');
                tbody.innerHTML = '';

                for (const id in novoFormato) {
                    const paciente = novoFormato[id];
                    const row = document.createElement('tr');

                    const idCell = document.createElement('td');
                    idCell.textContent = paciente.id;
                    row.appendChild(idCell);

                    const nomeCell = document.createElement('td');
                    nomeCell.textContent = paciente.nome_paciente;
                    row.appendChild(nomeCell);

                    const cpfCell = document.createElement('td');
                    cpfCell.textContent = paciente.cpf;
                    row.appendChild(cpfCell);

                    const telefoneCell = document.createElement('td');
                    telefoneCell.textContent = paciente.telefone;
                    row.appendChild(telefoneCell);

                    const emailCell = document.createElement('td');
                    emailCell.textContent = paciente.email;
                    row.appendChild(emailCell);

                    tbody.appendChild(row);
                }
            
                
            })
            .catch((error)=>{
                console.log('errou')
            })
        }
    
        button.addEventListener('click', ( )=> fetchApi(event));      
        
       
        


    </script>
</body>
</html>