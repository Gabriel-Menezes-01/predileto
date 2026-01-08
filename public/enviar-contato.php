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
    
    // Preparar email usando Formspree
    $formspreeEndpoint = 'https://formspree.io/f/xjgkabka';
    
    $mensagemCompleta = "📧 NOVA MENSAGEM DE CONTATO\n\n";
    $mensagemCompleta .= "👤 Nome: $nome\n";
    $mensagemCompleta .= "📧 Email: $email\n";
    $mensagemCompleta .= "📱 Telefone: $telefone\n";
    $mensagemCompleta .= "📋 Assunto: $assunto\n\n";
    $mensagemCompleta .= "💬 Mensagem:\n$mensagem\n\n";
    $mensagemCompleta .= "Responda este cliente pelo email: $email";
    
    $emailEnviado = false;
    
    $postData = [
        'name' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'assunto' => $assunto,
        'message' => $mensagemCompleta,
        '_replyto' => $email,
        '_subject' => 'Contato: ' . $assunto . ' - ' . $nome
    ];
    
    // Tentar com cURL (método mais confiável)
    if (function_exists('curl_init')) {
        $ch = curl_init($formspreeEndpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        $emailEnviado = ($httpCode >= 200 && $httpCode < 300);
    }
    
    // Se cURL não estiver disponível, tentar com file_get_contents
    if (!$emailEnviado) {
        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-type: application/x-www-form-urlencoded\r\nAccept: application/json\r\n",
                'content' => http_build_query($postData),
                'timeout' => 10
            ]
        ]);
        
        $response = @file_get_contents($formspreeEndpoint, false, $context);
        $emailEnviado = ($response !== false);
    }
    
    // Sempre retornar sucesso pois os dados foram salvos
    echo json_encode([
        'success' => true,
        'emailSent' => $emailEnviado,
        'message' => 'Mensagem enviada com sucesso!',
        'info' => $emailEnviado ? 'Email enviado!' : 'Mensagem salva em mensagens.txt'
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
?>
