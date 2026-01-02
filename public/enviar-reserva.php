<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
    exit;
}

$nome     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$pessoas  = intval($_POST['pessoas'] ?? 0);
$horario  = trim($_POST['horario'] ?? '');
$data     = trim($_POST['data'] ?? '');

if (!$nome || !$email || !$telefone || !$pessoas || !$horario || !$data) {
    echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Email inválido.']);
    exit;
}

$dataFormatada = date('d/m/Y', strtotime($data));

// 1. SALVAR EM ARQUIVO (SEMPRE FUNCIONA)
$mensagemLog = "\n=== RESERVA - " . date('d/m/Y H:i:s') . " ===\n";
$mensagemLog .= "Nome: $nome | Email: $email | Tel: $telefone\n";
$mensagemLog .= "Data: $dataFormatada | Hora: $horario | Pessoas: $pessoas\n";

$arquivo = __DIR__ . '/reservas.txt';
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, "=== RESERVAS - PREDILETO ===\n\n");
}
file_put_contents($arquivo, $mensagemLog, FILE_APPEND);

// 2. ENVIAR EMAIL via FormSubmit (sem precisar de configuração)
$emailEnviado = false;

$mensagemEmail = "
Nome: $nome
Email do Cliente: $email
Telefone: $telefone
Pessoas: $pessoas
Data da Reserva: $dataFormatada
Horário: $horario
";

// Usar Formspree (necessário: configurar uma vez em formspree.io)
$formspreeEndpoint = 'https://formspree.io/f/xlgdjead';

// Preparar dados para envio ao Formspree
$mensagemCompleta = "🍽️ NOVA RESERVA - RESTAURANTE PREDILETO\n\n";
$mensagemCompleta .= "👤 Nome: $nome\n";
$mensagemCompleta .= "📧 Email: $email\n";
$mensagemCompleta .= "📱 Telefone: $telefone\n";
$mensagemCompleta .= "👥 Pessoas: $pessoas\n";
$mensagemCompleta .= "📅 Data: $dataFormatada\n";
$mensagemCompleta .= "🕐 Horário: $horario\n\n";
$mensagemCompleta .= "Responda este cliente pelo email: $email";

// Tenta enviar para Formspree usando cURL (mais confiável)
$emailEnviado = false;

$postData = [
    'name' => $nome,
    'email' => $email,
    'telefone' => $telefone,
    'pessoas' => $pessoas,
    'data' => $dataFormatada,
    'horario' => $horario,
    'message' => $mensagemCompleta,
    '_replyto' => $email,
    '_subject' => 'Nova Reserva - ' . $nome . ' - ' . $dataFormatada
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

// Responder sucesso
echo json_encode([
    'success' => true,
    'message' => 'Reserva confirmada e salva!',
    'emailSent' => $emailEnviado,
    'info' => $emailEnviado ? 'Email enviado com sucesso!' : 'Reserva salva. Verifique o arquivo reservas.txt'
]);
?>
