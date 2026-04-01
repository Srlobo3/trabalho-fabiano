# Documentação do Sistema – Site de Mensagens

## 1. Visão Geral

Este sistema é um site simples que permite aos usuários:

* Se cadastrarem com nome, e-mail, senha e foto
* Escreverem mensagens
* Visualizarem mensagens de outros usuários

Todo o funcionamento ocorre em uma única página, sem necessidade de um sistema de login separado.

---

## 2. Como utilizar o site

### 2.1 Preenchimento dos dados

Ao acessar o site, o usuário encontrará um formulário com os seguintes campos:

* Nome: deve conter apenas letras (sem números ou caracteres especiais)
* Email: não pode ser repetido com dados diferentes
* Senha: deve possuir no mínimo 4 caracteres
* Foto: campo opcional
* Mensagem: texto que será exibido no site

---

### 2.2 Envio da mensagem

Após preencher os campos:

1. Clique no botão "Enviar"
2. A mensagem será exibida na lista abaixo do formulário

---

## 3. Regras do sistema

### 3.1 Cadastro de usuário

* Se o e-mail não existir no sistema, um novo usuário será criado
* Se o e-mail já existir:

  * Nome e senha corretos: o usuário pode enviar mensagens normalmente
  * Nome ou senha incorretos: o sistema bloqueia a ação

---

### 3.2 Persistência de dados

* O sistema armazena temporariamente os dados do usuário
* Ao retornar à página, nome e e-mail permanecem preenchidos
* Não é necessário inserir os dados novamente a cada acesso

---

### 3.3 Imagem de perfil

* Se o usuário enviar uma imagem, ela será utilizada nas mensagens
* Caso contrário, será utilizada uma imagem padrão
* A imagem é exibida junto com cada mensagem

---

### 3.4 Mensagens

* Usuários válidos podem enviar mensagens
* As mensagens são exibidas em ordem decrescente (mais recentes primeiro)
* Cada mensagem apresenta:

  * Nome do usuário
  * Imagem de perfil
  * Conteúdo da mensagem

---

## 4. Tratamento de erros

### 4.1 E-mail já cadastrado

Mensagem exibida:
"Email já cadastrado com dados diferentes"

Significado:

* O e-mail já existe no sistema
* Os dados informados não correspondem ao cadastro original

Solução:

* Utilizar o mesmo nome e senha previamente cadastrados

---

### 4.2 Campos obrigatórios

* O envio pode falhar se campos essenciais não forem preenchidos, como nome ou mensagem

---

## 5. Estrutura do projeto

* index.php: arquivo principal contendo toda a lógica do sistema
* css/: arquivos de estilo
* js/: scripts de validação e interação
* uploads/: armazenamento das imagens dos usuários

---

## 6. Funcionamento técnico (resumo)

* Utiliza banco de dados MySQL
* As senhas são armazenadas de forma criptografada
* Utiliza sessões para manter os dados do usuário
* Evita duplicação de e-mails
* Garante consistência nas informações cadastradas

---

## 7. Conclusão

O sistema foi desenvolvido com o objetivo de ser simples, funcional e acessível, permitindo o cadastro de usuários e a publicação de mensagens de forma direta, sem necessidade de autenticação complexa.

Para utilizar, basta preencher o formulário e enviar uma mensagem.
