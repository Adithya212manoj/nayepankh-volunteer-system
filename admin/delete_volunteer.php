<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    $stmt = $conn->prepare(
        "DELETE FROM volunteers WHERE volunteer_id = ?"
    );

    $stmt->bind_param("i", $id);

    $stmt->execute();
}

header("Location: volunteers.php");
exit();
?>