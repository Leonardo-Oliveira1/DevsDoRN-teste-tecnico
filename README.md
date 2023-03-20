<br> 

<h1 align="center">DEVS DO RN</h1>

<br> 

<p align="center">Software para facilitar a gerência dos associados e suas anuidades</p>

<h4 align="center"> 
	✔ Concluido ✔ 
</h4>
<br>

## Instalações

### 👨‍💻 Rodando a aplicação no ambiente de desenvolvimento
Antes de começar, você vai precisar ter instalado em sua máquina a **versão 8.0.26 do PHP** para rodar este projeto.

Aqui não há nada fora do comum. Basicamente, você deve clonar o repositório e fazer os procedimentos padrões do Laravel para rodar a aplicação, como instalar as depedências e configurar o .env. **Não esquecendo de rodar as migrations**! 

```bash
# Clone este repositório
$ git clone https://github.com/Leonardo-Oliveira1/DevsDoRN.git

# Acesse a pasta do projeto no terminal/cmd
$ cd DevsDoRN

# Instale as dependências do Composer (essa instalação pode levar vários minutos)
$ composer install

# Instale as dependências do Node (essa instalação pode levar vários minutos)
$ npm install

$ Crie um banco de dados MySQL chamado 'devsdorn' e use a collation equivalente a 'utf8_general_ci'

$ Configure o seu arquivo .env, lembrando de alterar, principalmente, o nome do banco e o acesso.

# Crie uma chave para sua aplicação
$ php artisan key:generate

# Tudo prontinho para rodar o projeto no seu computador
$ php artisan serve

```

<br>
