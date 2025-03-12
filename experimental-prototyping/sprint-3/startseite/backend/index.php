<?php
$dsn = 'pgsql:host=db;port=5432;dbname=cong_bank';
$user = 'postgres';
$password = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/api/balance') {
    $accountNumber = $_GET['accountNumber'] ?? null;
    if ($accountNumber) {
        $stmt = $pdo->prepare('SELECT balance FROM accounts WHERE account_number = :accountNumber');
        $stmt->execute(['accountNumber' => $accountNumber]);
        $account = $stmt->fetch(PDO::FETCH_ASSOC);
        $balance = $account ? $account['balance'] : 0;
        header('Content-Type: application/json');
        echo json_encode(['balance' => $balance]);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Account number is required']);
    }
}