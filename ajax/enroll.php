<?php

session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'You have to login']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true); //تقرأ الجسم (Body) للطلب المرسل من JavaScript (الذي أرسلناه في fetch()).

$cid = (int)$data['course_id'];

require '../db.php';

try {
    $stmt = $conn->prepare("SELECT 1 FROM enrollments WHERE student_id = :sid AND course_id = :cid");
    $sid = $_SESSION['id'];
    $stmt->bindParam(':sid', $sid, PDO::PARAM_INT);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'You are already enrolled in this course']);
        exit;
    }

    $insert = $conn->prepare("INSERT INTO enrollments (student_id, course_id) VALUES (:sid, :cid)");
    $insert->bindParam(':sid', $sid, PDO::PARAM_INT);
    $insert->bindParam(':cid', $cid, PDO::PARAM_INT);
    $insert->execute();

    echo json_encode(['success' => true, 'message' => 'The enrollment has been done']);

} catch (PDOException $e) {
    error_log("Enrollment error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'An error occurred during the enrollment']);
}

