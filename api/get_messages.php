<?php
header('Content-Type: application/json');
require_once '../includes/auth.php'; // Authorization check
require_once '../includes/db.php';   // Database connection

try {
    // Fetch all messages sorted by submission date (newest first)
    $stmt = $pdo->query("SELECT * FROM messages ORDER BY submitted_at DESC");
    $messages = $stmt->fetchAll();
    echo json_encode(['success' => true, 'data' => $messages]);
} catch (Exception $e) {
    // Return error message if the query fails
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>