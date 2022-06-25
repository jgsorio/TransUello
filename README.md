# Projeto Trans Uello

## Instalação
1. Baixe o projeto para um diretório da sua escolha

2. Instale o docker na sua máquina local
### Instalação do Docker
Acesse o site [Docker](https://docs.docker.com/get-docker/) para realizar a instalação do seu sistema operacional

### Docker compose
Instale o docker compose [Docker Compose](https://docs.docker.com/compose/install/) para realização da instalação dos containers do projeto

### Executar o projeto
Após a realizar as instalaçoes anteriores, no diretório do projeto, execute o seguinte comando:
``` docker compose up -d ```
Aguarde o termino da instalação.

### Executando o Laravel
Acesse o container do projeto que está em execução na sua máquina com o seguinte comando
``` docker exec -it transuello-laravel bash ```
Você acessará a linha de comando do container que está executando o laravel.
Em seguida crie o arquivo .env copie as configurações do arquivo .env.exemple para o ele, com o seguinte comando.
``` cp -p .env.exemple .env ```
Instale o sistema de bibliotecas, digitando o comando:
``` composer install ```

### Instalando o Banco de Dados
Ainda no terminal de comandos do container do projeto, digite o seguinte comando e pressione enter:
``` php artisan migrate --seed ```
Aguarde o termino das migrações

### Acessando o projeto
No browser da sua preferência, acesso o endereço: http://localhost

### Logar no sistema
No sistema já existe um usuário padrão, que você poderá usar com os seguintes dados:
Email: admin@material.com
Senha: secret


### Suporte
Caso haja alguma dúvida, encaminhar um email para joseguilhermesorio@gmail.com
