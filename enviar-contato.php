<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
    $assunto = isset($_POST['assunto']) ? trim($_POST['assunto']) : '';
    $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';
    
    // Validação básica
    if (empty($nome) || empty($email) || empty($telefone) || empty($assunto) || empty($mensagem)) {
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Email inválido.']);
        exit;
    }
    
    // Preparar dados para salvar em arquivo (fallback)
    $logFile = __DIR__ . '/mensagens.txt';
    $mensagemLog = "\n\n=== NOVA MENSAGEM - " . date('d/m/Y H:i:s') . " ===\n";
    $mensagemLog .= "Nome: " . $nome . "\n";
    $mensagemLog .= "Email: " . $email . "\n";
    $mensagemLog .= "Telefone: " . $telefone . "\n";
    $mensagemLog .= "Assunto: " . $assunto . "\n";
    $mensagemLog .= "Mensagem: " . $mensagem . "\n";
    
    // Salvar em arquivo
    file_put_contents($logFile, $mensagemLog, FILE_APPEND);
    
    // Preparar email
    $para = 'gabrielme2000.gm@gmail.com';
    $assuntoEmail = 'Mensagem de Contato - ' . $assunto;
    $mensagemEmail = "NOVA MENSAGEM DE CONTATO\n\n";
    $mensagemEmail .= "Nome: " . $nome . "\n";
    $mensagemEmail .= "Email: " . $email . "\n";
    $mensagemEmail .= "Telefone: " . $telefone . "\n";
    $mensagemEmail .= "Assunto: " . $assunto . "\n\n";
    $mensagemEmail .= "Mensagem:\n" . $mensagem;
    
    $headers = "From: noreply@predileto.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Enviar email (pode falhar no WAMP local, mas dados estão salvos)
    @mail($para, $assuntoEmail, $mensagemEmail, $headers);
    
    // Sempre retornar sucesso pois os dados foram salvos
    echo json_encode([
        'success' => true, 
        'message' => 'Mensagem registrada com sucesso! (Dados salvos em mensagens.txt)'
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
?>
