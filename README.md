<br> 

<h1 align="center">DEVS DO RN</h1>

<br> 

<p align="center">Desafio técnico para vaga de PHP</p>

O gerente da associação "Devs do RN", precisa de um software para facilitar a gerência dos associados e suas anuidades. Pensando nas necessidades do gerente, listamos abaixo as funcionalidades que o software precisa ter.

- Cadastro de associados, com: Nome, E-mail, CPF e Data de filiação.
- Cadastro de anuidades, com: Ano e Valor.
    - Cada ano, o valor da anuidade pode ser diferente. Ex: 2021 = R$90,00 / 2022 = R$100,00 / 2023 = R$110,00.
    - Esse valor deve ser facilmente ajustado pelo gerente.
- Cobrança das anuidades do associado.
    - "Checkout" das anuidade devidas pelo associado, calculando valor devido por anuidade e valor total devido.
    - Considere a Data de filiação para saber quais anuidades são devidas pelo associado.
- "Pagamento" da anuidade de um associado.
    - Para este teste o pagamento será simplesmente uma flag no banco de dados, indicando se a anuidade foi paga ou não.
- O software também deve ser capaz de identificar quais são os associados com pagamento em dia e quais estão em atraso.
    - Para isso considere todo novo associado devedor da anuidade corrente.


<h4 align="center"> 
	✔ Concluido ✔ 
</h4>
<br>

## Instalações

### 👨‍💻 Rodando a aplicação no ambiente de desenvolvimento
Antes de começar, é necessário ter instalado em sua máquina a **versão 8.0.26 do PHP** para rodar este projeto.

Aqui não há nada fora do comum. Basicamente, você deve clonar o repositório e fazer os procedimentos padrões do Laravel para rodar a aplicação, como instalar as dependências e configurar o .env.

```bash
# Clone este repositório
$ git clone https://github.com/Leonardo-Oliveira1/DevsDoRN.git

# Acesse a pasta do projeto no terminal/cmd
$ cd DevsDoRN

# Instale as dependências do Composer (essa instalação pode levar vários minutos)
$ composer install


$ Crie um banco de dados MySQL chamado 'devsdorn' e cole a query de criação do banco.

$ Clone o arquivo .env.example e renomeie-o para '.env'. Em seguida, altere o nome do banco para 'devsdorn' e configure o acesso do login e senha.

# Crie uma chave para sua aplicação
$ php artisan key:generate

# Tudo prontinho para rodar o projeto no seu computador
$ php artisan serve

```

<br>
