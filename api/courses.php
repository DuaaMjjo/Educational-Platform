<?php

header('Content-Type: application/json');
include '../db.php';

try {
    $stmt = $conn->query("SELECT  id, title, description, price, image FROM courses");
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($courses);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred during courses loading',
    ]);
}

