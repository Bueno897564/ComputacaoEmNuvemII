<?php
// Configurações de conexão
$host = getenv('DB_HOST') ?: 'localhost';
$dbname = getenv('DB_NAME') ?: 'seu_banco_de_dados';
$user = getenv('DB_USER') ?: 'seu_usuario';
$password = getenv('DB_PASSWORD') ?: 'sua_senha';

try {
    // Criar a conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    // Configura o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Opcional: definir o fetch mode padrão para objetos
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    // Em caso de erro, exibe uma mensagem (em produção, melhor logar em vez disso)
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
