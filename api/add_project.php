<?php
header('Content-Type: application/json');
require_once '../includes/auth.php';
require_once '../includes/db.php';

// Get JSON input data
$data = json_decode(file_get_contents('php://input'), true);

$title       = htmlspecialchars(trim($data['title'] ?? ''));
$description = htmlspecialchars(trim($data['description'] ?? ''));
$tech_stack  = htmlspecialchars(trim($data['tech_stack'] ?? ''));
$category    = htmlspecialchars(trim($data['category'] ?? 'General'));
$github_url  = htmlspecialchars(trim($data['github_url'] ?? ''));
$image_url   = htmlspecialchars(trim($data['image_url'] ?? '')); 

// Validate required fields
if (!$title || !$description || !$tech_stack) {
    echo json_encode(['success' => false, 'error' => 'Required fields are missing.']);
    exit;
}

try {
    // Insert project data into database
    $stmt = $pdo->prepare("INSERT INTO projects (title, description, tech_stack, category, github_url, image_url) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $tech_stack, $category, $github_url, $image_url]);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Return error message for debugging
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}