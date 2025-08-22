<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';

// التحقق هل المستخدم مدير
$stmt = $conn->prepare("SELECT is_admin FROM students WHERE id = :id");
$stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user['is_admin']) {
    echo "Access Denied. Admins only.";
    exit;
}
?>
