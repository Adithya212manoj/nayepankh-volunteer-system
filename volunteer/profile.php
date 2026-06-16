<?php
session_start();

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$id = $_SESSION['volunteer_id'];

$stmt = $conn->prepare("SELECT * FROM volunteers WHERE volunteer_id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$volunteer = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body class="registration-section">

<div class="container py-5">

    <div class="registration-card mx-auto">

        <h2 class="mb-4">My Profile 👤</h2>

        <p><strong>Volunteer ID:</strong> <?php echo $volunteer['volunteer_code']; ?></p>

        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($volunteer['full_name']); ?></p>

        <p><strong>Email:</strong> <?php echo htmlspecialchars($volunteer['email']); ?></p>

        <p><strong>Phone:</strong> <?php echo htmlspecialchars($volunteer['phone']); ?></p>

        <p><strong>Address:</strong> <?php echo htmlspecialchars($volunteer['address']); ?></p>

        <p><strong>Areas of Interest:</strong> <?php echo htmlspecialchars($volunteer['skills']); ?></p>

        <p><strong>Availability:</strong> <?php echo htmlspecialchars($volunteer['availability']); ?></p>

        <p><strong>Status:</strong> <?php echo $volunteer['status']; ?></p>

        <a href="edit_profile.php"
           class="btn btn-success">

            Edit Profile

        </a>

        <a href="dashboard.php"
           class="btn btn-secondary">

            Back

        </a>

    </div>

</div>

</body>
</html>