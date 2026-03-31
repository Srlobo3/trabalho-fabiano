# 📌 Projeto de Sistema de Login + Dashboard (PHP + MySQL + JS)

## 🧠 Sobre o Projeto

Este projeto é um sistema simples de:

* Cadastro de usuários
* Login
* Dashboard com mensagens
* Envio e listagem de mensagens
* Limpar todas as mensagens

Ele foi feito usando:

* **PHP** (backend)
* **MySQL** (banco de dados)
* **JavaScript** (validação)
* **CSS** (estilo visual)

---

## ⚙️ Como funciona (visão geral)

### 🔐 Cadastro

O usuário cria uma conta com:

* Nome (sem números)
* Email
* Senha

A senha é **criptografada** antes de salvar no banco.

---

### 🔑 Login

O usuário faz login com:

* Email
* Senha

Se estiver correto:
➡️ entra no dashboard

Se estiver errado:
➡️ aparece erro na tela

---

### 📊 Dashboard

Depois de logar, o usuário pode:

* Escrever mensagens (máx 250 caracteres)
* Ver suas mensagens
* Apagar todas as mensagens
* Fazer logout

---

## 🗂️ Estrutura de Arquivos

```
/projeto
│
├── php/
│   ├── config.php
│   ├── login.php
│   ├── register.php
│   ├── dashboard.php
│   ├── save_message.php
│   ├── clear_messages.php
│   └── logout.php
│
├── css/
│   ├── style.css
│   ├── style2.css
│   └── dashboard.css
│
├── js/
│   └── script.js
```

---

## 🧾 Banco de Dados

### 🧑‍💻 Tabela `users`

```sql
id INT AUTO_INCREMENT PRIMARY KEY
nome VARCHAR(100)
email VARCHAR(100)
senha VARCHAR(255)
```

---

### 💬 Tabela `messages`

```sql
id INT AUTO_INCREMENT PRIMARY KEY
user_id INT
mensagem VARCHAR(250)
```

---

## 🔒 Segurança implementada

* Senha criptografada (`password_hash`)
* Verificação de login com sessão
* Bloqueio de acesso direto ao dashboard
* Limite de caracteres nas mensagens

---

## 🧪 Validações (JavaScript)

### Login

* Email precisa ter `@` e `.`
* Senha mínima de 3 caracteres

---

### Cadastro

* Nome não pode ter números
* Email válido
* Senha mínimo 4 caracteres

---

### Mensagens

* Não pode estar vazia
* Máximo de 250 caracteres
* Contador em tempo real (ex: `120/250`)

---

## 🎨 Interface (CSS)

O design é:

* Limpo
* Centralizado
* Cores suaves (verde e azul)
* Botões com animação
* Feedback visual nos inputs

---

## 🔄 Fluxo do sistema

1. Usuário acessa cadastro
2. Cria conta
3. Vai para login
4. Faz login
5. Entra no dashboard
6. Envia mensagens
7. Pode limpar tudo ou sair

---

## 🚨 Possíveis erros comuns

### ❌ CSS não aplica

* Caminho errado do arquivo
* Nome digitado errado

---

### ❌ JS não funciona

* `script.js` não carregado
* função não chamada no `onsubmit`

---

### ❌ Mensagem não envia

* erro na validação JS
* nome do arquivo errado (`-` vs `_`)

---

### ❌ Sessão não funciona

* faltando `session_start()` no `config.php`



## 👨‍💻 Para rodar o projeto

1. Instale um servidor (XAMPP, WAMP, etc)
2. Coloque o projeto na pasta `htdocs`
3. Crie o banco de dados
4. Configure o `config.php`
5. Acesse no navegador:

```
http://localhost/projeto/php/login.php
```

---

## ✅ Conclusão

Esse projeto é ótimo para aprender:

* CRUD básico
* Sessões em PHP
* Integração com banco
* Validação com JavaScript
* Organização de sistema web

---

