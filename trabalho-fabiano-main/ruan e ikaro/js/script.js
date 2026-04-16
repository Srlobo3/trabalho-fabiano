document.addEventListener("DOMContentLoaded", () => {
    const mensagem = document.getElementById("mensagem");
    const contador = document.getElementById("contador");

    if (mensagem && contador) {
        const atualizarContador = () => {
            contador.textContent = `${mensagem.value.length} / 200`;
        };

        mensagem.addEventListener("input", atualizarContador);
        atualizarContador();
    }

    const formCadastro = document.getElementById("formCadastro");
    if (formCadastro) {
        formCadastro.addEventListener("submit", (e) => {
            const nome = document.getElementById("nome");
            const email = document.getElementById("email");
            const senha = document.getElementById("senha");

            let valido = true;
            const erros = formCadastro.querySelectorAll(".erro-msg");
            erros.forEach(el => el.textContent = "");

            if (!nome.value.trim()) {
                erros[0].textContent = "Digite seu nome.";
                valido = false;
            }

            if (!email.value.trim()) {
                erros[1].textContent = "Digite seu email.";
                valido = false;
            }

            if (!senha.value.trim()) {
                erros[2].textContent = "Digite sua senha.";
                valido = false;
            }

            if (!valido) {
                e.preventDefault();
            }
        });
    }

    const formLogin = document.getElementById("formLogin");
    if (formLogin) {
        formLogin.addEventListener("submit", (e) => {
            const email = document.getElementById("login_email");
            const senha = document.getElementById("login_senha");

            let valido = true;
            const erros = formLogin.querySelectorAll(".erro-msg");
            erros.forEach(el => el.textContent = "");

            if (!email.value.trim()) {
                erros[0].textContent = "Digite seu email.";
                valido = false;
            }

            if (!senha.value.trim()) {
                erros[1].textContent = "Digite sua senha.";
                valido = false;
            }

            if (!valido) {
                e.preventDefault();
            }
        });
    }

    const formMensagem = document.getElementById("formMensagem");
    if (formMensagem) {
        formMensagem.addEventListener("submit", (e) => {
            const campoMensagem = document.getElementById("mensagem");
            const erro = formMensagem.querySelector(".erro-msg");
            erro.textContent = "";

            if (!campoMensagem.value.trim()) {
                erro.textContent = "Digite uma mensagem.";
                e.preventDefault();
            }
        });
    }
});