<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $query = "INSERT INTO reviews (customer_name, review, rating) VALUES (:name, :review, :rating)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':review', $review);
    $stmt->bindParam(':rating', $rating);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'invalid_request']);
}
?>