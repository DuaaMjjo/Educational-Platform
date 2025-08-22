<?php
include 'db.php';
include 'auth_admin.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM students WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: users.php");
exit;
