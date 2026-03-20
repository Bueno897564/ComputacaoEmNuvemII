<?php
// Inclui o arquivo de configuração com a conexão
require_once('../config.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Pega os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';

    // Prepara a query com segurança (evita SQL injection)
    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $email);

    // Executa a query e exibe mensagem
    if ($stmt->execute()) {
        echo "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color: red;'>Erro ao cadastrar: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário PHP + MySQL</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form method="POST" action="">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
