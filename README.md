# Projeto CRUD MVC em PHP

Este projeto é um exemplo de um aplicativo CRUD (Create, Read, Update, Delete) totalmente desenvolvido em PHP, sem o uso de frameworks. O objetivo principal é gerenciar registros de usuários e seus respectivos setores, incluindo a capacidade de vincular e desvincular múltiplos setores a um usuário.

## Funcionalidades

- [x] Criação de usuários
- [x] Edição de informações de usuários
- [x] Exclusão de usuários
- [x] Listagem de usuários
- [x] Vinculação de setores a usuários
- [x] Desvinculação de setores de usuários
- [x] Filtragem de usuários por setor

## Tecnologias Utilizadas

- PHP 7.4
- MySQL
- HTML/CSS/Bootstrap 5
- JavaScript/JQuery (para funcionalidades interativas)
- Composer (Para carregamento automático de classes seguindo o padrão PSR-4)

## Instruções de Uso

1. Clone o repositório para o seu ambiente de desenvolvimento.

2. Configure a conexão com o banco de dados no arquivo `"App/config.php"`.
3. Execute a query `"database.sql"` que está dentro do diretório `"Modelagem Banco de Dados"` para que seja criado o banco de dados e a tabelas necessária para o projeto;
4. Execute o comando abaixo no diretório raiz do projeto para gerar o carregamento das classes.

```
composer dump-autoload -o
```

4. Execute o aplicativo em um servidor da web. Você pode usar um servidor local, como o XAMPP, WAMP ou o servidor web embutido do PHP.
5. Para executar utilizando XAMPP, mova os diretórios do repositório para a pasta "htdocs" do XAMPP. Caso queira utilizar o servidor web embutido do PHP, execute o comando abaixo na pasta raiz do projeto.

```
php -S localhost:8000 -t App
```
6. Acesse a aplicação no navegador e comece a utilizar as funcionalidades CRUD.

## Estrutura de Diretórios
```
│   .gitignore
│   .htaccess
│   composer.json
│   composer.lock
│   README.md
│
├───App
│   │   config.php
│   │   index.php
│   │   routes.php
│   │
│   ├───Controller
│   │       SetorController.php
│   │       UserController.php
│   │
│   ├───Core
│   │       Controller.php
│   │       DAO.php
│   │       Model.php
│   │
│   ├───DAO
│   │       SetorDAO.php
│   │       UserDAO.php
│   │
│   ├───Model
│   │       SetorModel.php
│   │       UserModel.php
│   │
│   └───View
│       └───modules
│           ├───Footer
│           │       Footer.php
│           │
│           ├───Header
│           │       Header.php
│           │
│           ├───Setor
│           │       FormSetor.php
│           │       ListSetores.php
│           │
│           └───User
│                   EditUser.php
│                   ListUsers.php
│                   RegisterUser.php
│
├───Modelagem Banco de Dados
│       database.sql
│
└───vendor
    │   autoload.php
    │
    └───composer
            autoload_classmap.php
            autoload_namespaces.php
            autoload_psr4.php
            autoload_real.php
            autoload_static.php
            ClassLoader.php
            LICENSE
```