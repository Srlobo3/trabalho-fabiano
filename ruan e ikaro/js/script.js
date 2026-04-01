const form = document.getElementById("form");

const nome = document.getElementById("nome");
const email = document.getElementById("email");
const senha = document.getElementById("senha");
const mensagem = document.getElementById("mensagem");

const erroNome = document.getElementById("erro-nome");
const erroEmail = document.getElementById("erro-email");
const erroSenha = document.getElementById("erro-senha");
const erroMensagem = document.getElementById("erro-mensagem");

const contador = document.getElementById("contador");

mensagem.addEventListener("input", () => {
    let tamanho = mensagem.value.length;
    contador.textContent = tamanho + " / 250";

    contador.style.color = tamanho > 180 ? "red" : "#ccc";
});

form.addEventListener("submit", function(e) {
    let valido = true;

    limparErros();

    // NOME (sem número e sem caractere especial)
    let regexNome = /^[A-Za-zÀ-ÿ\s]+$/;

    if (nome.value.trim() === "") {
        setErro(nome, erroNome, "Nome é obrigatório");
        valido = false;
    } else if (!regexNome.test(nome.value)) {
        setErro(nome, erroNome, "Nome não pode ter números ou caracteres especiais");
        valido = false;
    }

    // EMAIL
    if (email.value.trim() === "") {
        setErro(email, erroEmail, "Email é obrigatório");
        valido = false;
    } else if (!email.value.includes("@") || !email.value.includes(".")) {
        setErro(email, erroEmail, "Email inválido");
        valido = false;
    }

    // SENHA
    if (senha.value.length < 4) {
        setErro(senha, erroSenha, "Senha precisa ter pelo menos 4 caracteres");
        valido = false;
    }

    // MENSAGEM
    if (mensagem.value.trim() === "") {
        setErro(mensagem, erroMensagem, "Mensagem não pode estar vazia");
        valido = false;
    }

    if (!valido) {
        e.preventDefault();
    }
});

function setErro(input, elementoErro, mensagem) {
    input.classList.add("erro");
    elementoErro.textContent = mensagem;
}

function limparErros() {
    document.querySelectorAll(".erro").forEach(el => el.classList.remove("erro"));
    document.querySelectorAll(".erro-msg").forEach(el => el.textContent = "");
}