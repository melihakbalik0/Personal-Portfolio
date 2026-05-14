<?php
header('Content-Type: application/json');
require_once '../includes/auth.php';
require_once '../includes/db.php';

// Decode JSON request body
$data = json_decode(file_get_contents('php://input'), true);
$action = $data['action'] ?? '';
$id = (int)($data['id'] ?? 0);

try {
    if ($action === 'delete') {
        // Remove project from the database
        $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true]);

    } elseif ($action === 'mark_read') {
        // Update message status to read
        $stmt = $pdo->prepare("UPDATE messages SET is_read = 1 WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true]);

    } else {
        // Handle undefined actions
        echo json_encode(['success' => false, 'error' => 'Invalid action.']);
    }
} catch (Exception $e) {
    // Return database error message
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}