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

if (!$volunteer) {
    die("Volunteer not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Volunteer Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body class="registration-section">

<div class="container py-5">

    <div class="registration-card mx-auto">

        <div class="text-center mb-4">

    <?php if(!empty($volunteer['profile_picture'])) { ?>

        <img src="../uploads/profiles/<?php echo $volunteer['profile_picture']; ?>"
             alt="Profile Picture"
             class="rounded-circle mb-3"
             width="120"
             height="120"
             style="object-fit: cover;">

    <?php } else { ?>

        <img src="https://via.placeholder.com/120"
             alt="Default Profile"
             class="rounded-circle mb-3">

    <?php } ?>

    <h2>
        Welcome back,
        <?php echo htmlspecialchars($volunteer['full_name']); ?> 👋
    </h2>

</div>

        <p class="text-muted">
            Thank you for being part of the NayePankh community.
        </p>

        <hr>

        <div class="row">

            <div class="col-md-6">

                <p>
                    <strong>Volunteer ID:</strong>
                    <?php echo $volunteer['volunteer_code']; ?>
                </p>

                <p>
                    <strong>Email:</strong>
                    <?php echo htmlspecialchars($volunteer['email']); ?>
                </p>

                <p>
                    <strong>Status:</strong>
                    <?php
if($volunteer['status']=="Approved"){
    echo '<span class="badge bg-success">Approved</span>';
}
elseif($volunteer['status']=="Pending"){
    echo '<span class="badge bg-warning text-dark">Pending</span>';
}
else{
    echo '<span class="badge bg-secondary">Inactive</span>';
}
?>
                </p>

            </div>

            <div class="col-md-6">

                <p>
                    <strong>Areas of Interest:</strong>
                    <?php echo htmlspecialchars($volunteer['skills']); ?>
                </p>

                <p>
                    <strong>Availability:</strong>
                    <?php echo htmlspecialchars($volunteer['availability']); ?>
                </p>

            </div>

        </div>

        <hr>

        <a href="profile.php" class="btn btn-success">
    View Profile
</a>

<a href="edit_profile.php" class="btn btn-warning">
    Edit Profile
</a>

<a href="events.php" class="btn btn-primary">
    Browse Events
</a>

<a href="my_events.php" class="btn btn-info">
    My Events
</a>

<a href="change_password.php" class="btn btn-outline-success">
    Change Password
</a>

<a href="logout.php" class="btn btn-danger">
    Logout
</a>
    </div>

</div>

</body>
</html>