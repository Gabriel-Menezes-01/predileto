<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require __DIR__ . '/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
$mensagemLog = "\n\n=== NOVA RESERVA - " . date('d/m/Y H:i:s') . " ===\n";
$mensagemLog .= "Nome: $nome\nEmail: $email\nTelefone: $telefone\nNúmero de Pessoas: $pessoas\n";
$mensagemLog .= "Data: $dataFormatada\nHorário: $horario\n";

// Sempre salvar em arquivo
file_put_contents(__DIR__ . '/reservas.txt', $mensagemLog, FILE_APPEND);

// Enviar via SMTP Gmail
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'SEU_EMAIL@gmail.com';     // troque
    $mail->Password   = 'SUA_APP_PASSWORD';        // app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('SEU_EMAIL@gmail.com', 'Predileto');
    $mail->addReplyTo($email, $nome);
    $mail->addAddress('gabrielme2000.gm@gmail.com', 'Reservas Predileto');

    $mail->Subject = 'Nova Reserva - ' . $nome;
    $mail->Body    = $mensagemLog;

    $mail->send();
    echo json_encode(['success' => true, 'emailSent' => true, 'message' => 'Reserva enviada por email e salva em reservas.txt.']);
} catch (Exception $e) {
    echo json_encode([
        'success' => true,
        'emailSent' => false,
        'message' => 'Email não pôde ser enviado, mas a reserva foi salva em reservas.txt.',
        'error' => $mail->ErrorInfo
    ]);
}
?>
