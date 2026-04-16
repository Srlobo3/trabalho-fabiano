<?php
session_start();
require_once "conexao.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensagem = trim($_POST["mensagem"] ?? "");

    if (empty($mensagem)) {
        $erro = "Digite uma mensagem.";
    } elseif (mb_strlen($mensagem) > 200) {
        $erro = "A mensagem deve ter no máximo 200 caracteres.";
    } else {
        $nome = $_SESSION["user_nome"];
        $foto = $_SESSION["user_foto"];

        $stmt = $conn->prepare("INSERT INTO messages (nome, mensagem, foto) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $mensagem, $foto);

        if ($stmt->execute()) {
            header("Location: dashboard.php");
            exit();
        } else {
            $erro = "Erro ao enviar mensagem.";
        }
    }
}

$result = $conn->query("SELECT * FROM messages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Site de Mensagens</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>

<div class="container dashboard-container">
    <div class="topo-dashboard">
        <div class="perfil-dashboard">
            <img src="<?php echo htmlspecialchars($_SESSION["user_foto"]); ?>" alt="Foto do usuário" class="foto-perfil" onerror="this.src='uploads/default.png'">
            <div>
                <h2>Olá, <?php echo htmlspecialchars($_SESSION["user_nome"]); ?></h2>
                <p><?php echo htmlspecialchars($_SESSION["user_email"]); ?></p>
            </div>
        </div>

        <a href="logout.php" class="btn-sair">Sair</a>
    </div>

    <hr>

    <h3>Nova Mensagem</h3>

    <?php if (!empty($erro)): ?>
        <p class="erro-geral"><?php echo htmlspecialchars($erro); ?></p>
    <?php endif; ?>

    <form method="POST" id="formMensagem">
        <textarea name="mensagem" id="mensagem" maxlength="200" placeholder="Digite sua mensagem"></textarea>
        <small id="contador">0 / 200</small>
        <small class="erro-msg"></small>

        <button type="submit">Publicar</button>
    </form>

    <hr>

    <h3>Mensagens</h3>

    <div class="mensagens">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($row["foto"]); ?>" alt="Foto do autor" onerror="this.src='uploads/default.png'">

                    <div class="card-content">
                        <strong><?php echo htmlspecialchars($row["nome"]); ?></strong>
                        <p><?php echo htmlspecialchars($row["mensagem"]); ?></p>
                        <small><?php echo htmlspecialchars($row["data_envio"]); ?></small>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align:center;">Nenhuma mensagem ainda.</p>
        <?php endif; ?>
    </div>
</div>

<script src="../js/script.js"></script>
</body>
</html>