<?php
// Verifica se a requisição foi feita por método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclua o arquivo de conexão ao banco de dados
    require_once 'conecta.php';

    // Recebe os dados enviados pelo AJAX
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];

    // Prepara o comando SQL para inserir dados na tabela
    $sql = "INSERT INTO tabela4 (nome, matricula) VALUES (:nome, :matricula)";
    $stmt = $pdo->prepare($sql);

    // Associa os valores recebidos às variáveis no comando SQL
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':matricula', $matricula);

    // Executa o comando SQL
    if ($stmt->execute()) {
        // Cria um array com os dados inseridos
        $aluno = array("matricula" => $matricula, "nome" => $nome);

        // Retorna a resposta em formato JSON
        echo json_encode($aluno);
    }
}
?>