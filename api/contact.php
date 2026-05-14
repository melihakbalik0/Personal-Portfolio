<?php
header('Content-Type: application/json');
require_once '../includes/db.php';

$data = json_decode(file_get_contents('php://input'), true);

$name    = htmlspecialchars(trim($data['name'] ?? ''));
$email   = filter_var(trim($data['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$subject = htmlspecialchars(trim($data['subject'] ?? ''));
$message = htmlspecialchars(trim($data['message'] ?? ''));

// Hata mesajlarını İngilizceye çevirdik
if (!$name || !$email || !$subject || !$message) {
    echo json_encode(['success' => false, 'error' => 'All fields are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Invalid email address.']);
    exit;
}

try {
    // TABLO ADI DÜZELTİLDİ: contacts -> messages
    $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $subject, $message]);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}