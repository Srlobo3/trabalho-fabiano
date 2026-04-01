<?php
$conn = new mysqli("localhost", "root", "123456", "app_php");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$erro_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";
    $mensagem = $_POST["mensagem"] ?? "";

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $foto_nome = $_FILES["foto"]["name"] ?? "";
    $foto_tmp = $_FILES["foto"]["tmp_name"] ?? "";


    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $check = $stmt->get_result();

    if ($check->num_rows > 0) {
  
        $erro_email = "Este email já está cadastrado!";
    } else {

   
        $caminho = "uploads/default.png";

        if (!empty($foto_tmp)) {
            $ext = pathinfo($foto_nome, PATHINFO_EXTENSION);
            $novo_nome = uniqid() . "." . $ext;
            $caminho = "uploads/" . $novo_nome;

            move_uploaded_file($foto_tmp, __DIR__ . "/uploads/" . $novo_nome);
        }

        if (!empty($nome) && !empty($email) && !empty($senha)) {
            $stmt = $conn->prepare("INSERT INTO users (nome, email, senha, foto) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $email, $senha_hash, $caminho);
            $stmt->execute();
        }

        if (!empty($nome) && !empty($mensagem)) {
            $stmt = $conn->prepare("INSERT INTO messages (nome, mensagem, foto) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $mensagem, $caminho);
            $stmt->execute();
        }

        header("Location: index.php");
        exit();
    }
}

$result = $conn->query("SELECT * FROM messages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Site de Mensagens</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Cadastro + Mensagem</h2>

<form method="POST" enctype="multipart/form-data" id="form">

    <input type="text" name="nome" id="nome" placeholder="Nome">
    <small class="erro-msg"></small>

    <input type="email" name="email" id="email" placeholder="Email">
    <small class="erro-msg"><?php echo $erro_email; ?></small>

    <input type="password" name="senha" id="senha" placeholder="Senha">
    <small class="erro-msg"></small>

    <input type="file" name="foto" id="foto">

    <textarea name="mensagem" id="mensagem" maxlength="200" placeholder="Mensagem"></textarea>
    <small id="contador">0 / 200</small>
    <small class="erro-msg"></small>

    <button type="submit">Enviar</button>

</form>

<hr>

<h2>Mensagens</h2>

<div class="mensagens">
<?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card">

            <img src="<?php echo $row['foto']; ?>" onerror="this.src='upload/default.png'">

            <div class="card-content">
                <strong><?php echo htmlspecialchars($row['nome']); ?></strong>
                <p><?php echo htmlspecialchars($row['mensagem']); ?></p>
            </div>

        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p style="text-align:center;">Nenhuma mensagem ainda.</p>
<?php endif; ?>
</div>

<script src="../js/script.js"></script>

</body>
</html>