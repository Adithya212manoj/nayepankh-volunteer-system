<?php
session_start();

include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("
        SELECT *
        FROM volunteers
        WHERE email = ?
    ");

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $volunteer = $result->fetch_assoc();

        if (password_verify($password, $volunteer['password'])) {

            $_SESSION['volunteer_id'] = $volunteer['volunteer_id'];
            $_SESSION['volunteer_name'] = $volunteer['full_name'];

            header("Location: dashboard.php");
            exit();

        } else {

            die("Incorrect password.");

        }

    } else {

        die("No volunteer found with this email.");

    }
}
?>