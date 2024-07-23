<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if email already exists
    $checkQuery = "SELECT * FROM contacts WHERE email = :email";
    $checkStmt = $pdo->prepare($checkQuery);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        echo json_encode(['status' => 'already_subscribed']);
        exit;
    }

    $query = "INSERT INTO contacts (email) VALUES (:email)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'subscribed']);
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'invalid_request']);
}
?>