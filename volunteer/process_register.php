<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = trim($_POST['address']);
    $skills = isset($_POST['skills'])
    ? implode(", ", $_POST['skills'])
    : "";
    $availability = $_POST['availability'];

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check password match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Check if email already exists
    $check = $conn->prepare("SELECT volunteer_id FROM volunteers WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        die("Email already registered.");
    }

    // Generate Volunteer ID
    $volunteer_code = "NPF" . date("Y") . "-" . rand(1000, 9999);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $conn->prepare("
        INSERT INTO volunteers
        (volunteer_code, full_name, email, phone, gender, dob, address, skills, availability, password)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "ssssssssss",
        $volunteer_code,
        $full_name,
        $email,
        $phone,
        $gender,
        $dob,
        $address,
        $skills,
        $availability,
        $hashed_password
    );

    if ($stmt->execute()) {
        echo "
        <script>
            alert('Registration Successful! Your Volunteer ID is: $volunteer_code');
            window.location.href='login.php';
        </script>
        ";
    } else {
        echo "Something went wrong.";
    }
}
?>