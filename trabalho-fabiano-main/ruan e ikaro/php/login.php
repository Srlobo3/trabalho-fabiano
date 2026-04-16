<?php
session_start();
require_once "conexao.php";

if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit();
}

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if (empty($email) || empty($senha)) {
        $erro = "Preencha email e senha.";
    } else {
        $stmt = $conn->prepare("SELECT id, nome, email, senha, foto FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($senha, $user["senha"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_nome"] = $user["nome"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["user_foto"] = $user["foto"];

                header("Location: dashboard.php");
                exit();
            } else {
                $erro = "Senha incorreta.";
            }
        } else {
            $erro = "Usuário não encontrado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Site de Mensagens</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if (!empty($erro)): ?>
        <p class="erro-geral"><?php echo htmlspecialchars($erro); ?></p>
    <?php endif; ?>

    <form method="POST" id="formLogin">
        <input type="email" name="email" id="login_email" placeholder="Email">
        <small class="erro-msg"></small>

        <input type="password" name="senha" id="login_senha" placeholder="Senha">
        <small class="erro-msg"></small>

        <button type="submit">Entrar</button>
    </form>

    <p class="link-alt">
        Não tem conta? <a href="index.php">Cadastrar</a>
    </p>
</div>

<script src="../js/script.js"></script>
</body>
</html>