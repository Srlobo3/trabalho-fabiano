# Sistema de Mensagens com PHP e MySQL

## 1. Descrição

Sistema web desenvolvido em PHP com banco de dados MySQL. Permite cadastro de usuários, autenticação, envio de mensagens e visualização em formato de feed.

---

## 2. Tecnologias Utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP (Apache + MySQL)

---

## 3. Estrutura do Projeto


TRABALHO-FABIANO-MAIN
│

└── ruan e ikaro

├── css

│ └── style.css

├── js
│ └── script.js

├── php

│ ├── uploads
│ │ └── default.png

│ ├── conexao.php
│ ├── index.php
│ ├── login.php
│ ├── dashboard.php
│ └── logout.php

└── sql
└── banco.sql


---

## 4. Funcionalidades

### 4.1 Cadastro de Usuário

- Entrada de nome, email e senha
- Upload de imagem de perfil
- Validação de campos obrigatórios
- Verificação de email duplicado
- Armazenamento seguro da senha com hash

### 4.2 Login

- Autenticação por email e senha
- Verificação com password_verify
- Criação de sessão com $_SESSION
- Redirecionamento para dashboard

### 4.3 Dashboard

- Exibição de dados do usuário logado
- Exibição da imagem de perfil
- Envio de mensagens
- Listagem de mensagens em ordem decrescente
- Limite de caracteres nas mensagens

### 4.4 Logout

- Encerramento da sessão
- Redirecionamento para tela de login

---

## 5. Banco de Dados

### 5.1 Criação do Banco

```sql
CREATE DATABASE app_php;
USE app_php;
5.2 Tabela users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    foto VARCHAR(255) DEFAULT 'uploads/default.png'
);
5.3 Tabela messages
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    mensagem TEXT NOT NULL,
    foto VARCHAR(255) NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
6. Configuração do Ambiente
6.1 Instalação
Instalar XAMPP
Iniciar Apache e MySQL
6.2 Diretório do Projeto

Copiar a pasta do projeto para:

C:\xampp\htdocs\
6.3 Banco de Dados
Acessar http://localhost/phpmyadmin
Criar o banco app_php
Executar os scripts SQL
7. Execução

Acessar no navegador:

http://localhost/trabalho-fabiano-main/ruan%20e%20ikaro/php/index.php
8. Segurança
Uso de password_hash para armazenamento de senha
Uso de password_verify para autenticação
Uso de prepared statements (mysqli)
Uso de htmlspecialchars para evitar XSS

9. Fluxo do Sistema
Usuário realiza cadastro
Dados são armazenados no banco
Usuário realiza login
Sessão é criada
Usuário acessa o dashboard
Usuário envia mensagem
Mensagens são exibidas no feed
Usuário pode sair do sistema

10. Limitações
Tabela messages não possui relacionamento com users
Não há edição ou exclusão de mensagens
Upload de imagem com validação básica
Interface sem sistema de permissões
11. Melhorias Futuras
Implementar user_id na tabela messages
Adicionar edição e exclusão de mensagens
Melhorar validação de upload
Criar API para integração com frontend moderno
Aplicar arquitetura MVC


13. Finalidade

Projeto acadêmico para prática de desenvolvimento web com PHP e banco de dados relacional.
