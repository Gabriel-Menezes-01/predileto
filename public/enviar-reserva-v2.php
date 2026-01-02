<?php
// Configurar header JSON
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

// Validações
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
$mensagemLog = "\n\n=== NOVA RESERVA - " . date('d/m/Y H:i:s') . " ===\n";
$mensagemLog .= "Nome: $nome\nEmail: $email\nTelefone: $telefone\nPessoas: $pessoas\n";
$mensagemLog .= "Data: $dataFormatada\nHorário: $horario\n";

$arquivo = __DIR__ . '/reservas.txt';
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, "=== RESERVAS DO RESTAURANTE PREDILETO ===\n\n");
}
file_put_contents($arquivo, $mensagemLog, FILE_APPEND);

// 2. TENTAR ENVIAR POR EMAIL (usando Webhook ou API externa)
$emailEnviado = false;

// Opção A: Enviar para seu próprio servidor usando cURL
$webhookUrl = 'https://formspree.io/f/xyzabc'; // Você pode substituir com Formspree
// OU usar um webhook personalizado

// Opção B: Usar a função mail() do PHP simples
$para = 'gabrielme2000.gm@gmail.com';
$assunto = 'Nova Reserva - ' . $nome . ' (' . $dataFormatada . ')';

$mensagem = "
NOVA RESERVA RECEBIDA

Nome: $nome
Email: $email
Telefone: $telefone
Pessoas: $pessoas
Data: $dataFormatada
Horário: $horario

Responder para: $email
";

$headers = "From: noreply@predileto.com\r\n";
$headers .= "Reply-To: $email\r\n";

// Tentar enviar
$emailEnviado = @mail($para, $assunto, $mensagem, $headers);

// Tentar também enviar para o cliente uma confirmação
$assuntoCliente = 'Sua reserva foi registrada - Restaurante Predileto';
$mensagemCliente = "
Olá $nome,

Sua reserva foi registrada com sucesso!

Data: $dataFormatada
Horário: $horario
Pessoas: $pessoas

Obrigado por escolher o Predileto!

Restaurante Predileto
Praceta vale paraíso, 2765-053 Estoril
Tel: +351 926 233 942
";

@mail($email, $assuntoCliente, $mensagemCliente, $headers);

// Responder sucesso (a reserva sempre foi salva)
echo json_encode([
    'success' => true,
    'message' => 'Reserva confirmada! Você receberá em breve uma confirmação por email.',
    'emailSent' => $emailEnviado
]);
?>
