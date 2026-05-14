<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../includes/project_defaults.php';
$config = require __DIR__ . '/../includes/database.php';

$projects = [];

try {
    $dsn = sprintf(
        'mysql:host=%s;port=%s;dbname=%s;charset=%s',
        $config['host'],
        $config['port'],
        $config['dbname'],
        $config['charset']
    );
    $pdo = new PDO($dsn, $config['user'], $config['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    $stmt = $pdo->query('SELECT * FROM projects ORDER BY created_at DESC');
    $projects = $stmt->fetchAll();
} catch (Throwable $e) {
    $projects = [];
}

if ($projects === [] || $projects === false) {
    $projects = get_default_projects();
}

echo json_encode(
    ['success' => true, 'data' => $projects],
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
);
