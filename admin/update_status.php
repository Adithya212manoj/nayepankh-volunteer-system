<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$id = $_GET['id'];
$status = $_GET['status'];

$stmt = $conn->prepare(
    "UPDATE volunteers SET status=? WHERE volunteer_id=?"
);

$stmt->bind_param("si", $status, $id);
$stmt->execute();

header("Location: volunteers.php");
exit();
?>