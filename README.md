# 📌 Sistema de Login + Dashboard com Mensagens e Foto de Perfil

## 🧠 Sobre o Projeto

Este projeto é um sistema web completo que permite:

* Cadastro de usuários com foto de perfil
* Login seguro com senha criptografada
* Dashboard com envio de mensagens
* Visualização de mensagens de todos os usuários (feed global)
* Exclusão das próprias mensagens

Tecnologias utilizadas:

* **PHP** (backend)
* **MySQL** (banco de dados)
* **JavaScript** (validações e interação)
* **CSS** (interface)

---

## ⚙️ Funcionalidades

### 🔐 Cadastro

* Cadastro com **nome, email, senha e foto de perfil**
* Senha armazenada com **criptografia (`password_hash`)**
* Validação para impedir **emails duplicados**
* Upload opcional de imagem (com imagem padrão)

---

### 🔑 Login

* Autenticação com email e senha
* Verificação usando **`password_verify`**
* Sessão iniciada ao logar
* Redirecionamento automático para o dashboard

---

### 📊 Dashboard

* Envio de mensagens (máximo 250 caracteres)
* Contador de caracteres em tempo real
* Visualização de todas as mensagens (feed global)
* Exibição de:

  * 🖼️ Foto de perfil
  * 👤 Nome do usuário
  * 💬 Mensagem
* Botão para apagar **apenas suas mensagens**
* Logout do sistema

---

## 🗂️ Estrutura do Projeto

```
/projeto
│
├── /php
│   ├── config.php
│   ├── login.php
│   ├── register.php
│   ├── dashboard.php
│   ├── save_message.php
│   ├── clear_messages.php
│   └── logout.php
│
├── /css
│   ├── style.css
│   ├── style2.css
│   └── dashboard.css
│
├── /js
│   └── script.js
│
├── /uploads
│   └── default.png
```

---

## 🧾 Banco de Dados

### 🧑‍💻 Tabela `users`

```sql
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
email VARCHAR(100) UNIQUE,
senha VARCHAR(255),
foto VARCHAR(255) DEFAULT 'default.png'
```

---

### 💬 Tabela `messages`

```sql
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
mensagem VARCHAR(250)
```

---

## 🔒 Segurança

* Senhas protegidas com **hash**
* Validação de dados no frontend (JS)
* Controle de sessão para acesso ao dashboard
* Restrição de mensagens a 250 caracteres
* Prevenção de cadastro com email duplicado

---

## 🧪 Validações

### Cadastro

* Nome não pode conter números
* Email deve ser válido
* Senha com mínimo de 4 caracteres

---

### Login

* Email válido
* Senha mínima de 3 caracteres

---

### Mensagens

* Não pode estar vazia
* Máximo de 250 caracteres
* Contador dinâmico exibido na tela

---

## 🎨 Interface

* Design moderno e limpo
* Inputs com efeito de foco
* Botões com animação
* Layout centralizado
* Exibição organizada das mensagens
* Fotos de perfil em formato circular

---

## 🔄 Funcionamento do Sistema

1. Usuário se cadastra (com ou sem foto)
2. Faz login
3. Acessa o dashboard
4. Envia mensagens
5. Visualiza mensagens de todos os usuários
6. Pode apagar suas próprias mensagens
7. Pode sair do sistema

---

## 🚀 Como Executar

1. Instale um servidor local (ex: XAMPP)
2. Coloque o projeto na pasta `htdocs`
3. Crie o banco de dados e tabelas
4. Configure o arquivo `config.php`
5. Acesse no navegador:

```
http://localhost/ruan e ikaro/php/login.php
```

---

## 🎯 Resultado Final

O sistema funciona como uma **mini rede social**, onde:

* Usuários possuem identidade (nome + foto)
* Interagem através de mensagens
* Visualizam conteúdo compartilhado em um feed comum

---

## 🔥 Possíveis Evoluções

* Edição de perfil (trocar foto)
* Curtidas em mensagens
* Comentários
* Upload com preview de imagem
* Chat em tempo real

---

## ✅ Conclusão

Este projeto reúne conceitos importantes de desenvolvimento web:

* Autenticação de usuários
* Manipulação de banco de dados
* Upload de arquivos
* Validação de dados
* Organização de sistema completo

