<?php
session_start();
require_once "conexao.php";

$erro_email = "";
$erro_geral = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if (empty($nome) || empty($email) || empty($senha)) {
        $erro_geral = "Preencha nome, email e senha.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $check = $stmt->get_result();

        if ($check->num_rows > 0) {
            $erro_email = "Este email já está cadastrado!";
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $caminho = "uploads/default.png";

            if (!empty($_FILES["foto"]["tmp_name"])) {
                $foto_nome = $_FILES["foto"]["name"];
                $foto_tmp = $_FILES["foto"]["tmp_name"];
                $ext = strtolower(pathinfo($foto_nome, PATHINFO_EXTENSION));
                $permitidas = ["jpg", "jpeg", "png", "webp"];

                if (in_array($ext, $permitidas)) {
                    if (!is_dir(__DIR__ . "/uploads")) {
                        mkdir(__DIR__ . "/uploads", 0777, true);
                    }

                    $novo_nome = uniqid() . "." . $ext;
                    $destino = __DIR__ . "/uploads/" . $novo_nome;

                    if (move_uploaded_file($foto_tmp, $destino)) {
                        $caminho = "uploads/" . $novo_nome;
                    }
                }
            }

            $stmt = $conn->prepare("INSERT INTO users (nome, email, senha, foto) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $email, $senha_hash, $caminho);

            if ($stmt->execute()) {
                $sucesso = "Cadastro realizado com sucesso! Agora faça login.";
            } else {
                $erro_geral = "Erro ao cadastrar usuário.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Site de Mensagens</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Cadastro</h2>

    <?php if (!empty($erro_geral)): ?>
        <p class="erro-geral"><?php echo htmlspecialchars($erro_geral); ?></p>
    <?php endif; ?>

    <?php if (!empty($erro_email)): ?>
        <p class="erro-geral"><?php echo htmlspecialchars($erro_email); ?></p>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <p class="sucesso-geral"><?php echo htmlspecialchars($sucesso); ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" id="formCadastro">
        <input type="text" name="nome" id="nome" placeholder="Nome">
        <small class="erro-msg"></small>

        <input type="email" name="email" id="email" placeholder="Email">
        <small class="erro-msg"></small>

        <input type="password" name="senha" id="senha" placeholder="Senha">
        <small class="erro-msg"></small>

        <input type="file" name="foto" id="foto">
        <small class="erro-msg"></small>

        <button type="submit">Cadastrar</button>
    </form>

    <p class="link-alt">
        Já tem conta? <a href="login.php">Entrar</a>
    </p>
</div>

<script src="../js/script.js"></script>
</body>
</html>