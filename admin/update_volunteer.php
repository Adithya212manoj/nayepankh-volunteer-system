<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $availability = $_POST['availability'];

    $stmt = $conn->prepare("
        UPDATE volunteers
        SET
            full_name=?,
            email=?,
            phone=?,
            availability=?
        WHERE volunteer_id=?
    ");

    $stmt->bind_param(
        "ssssi",
        $full_name,
        $email,
        $phone,
        $availability,
        $id
    );

    $stmt->execute();

    header("Location: volunteers.php");
    exit();
}
?>