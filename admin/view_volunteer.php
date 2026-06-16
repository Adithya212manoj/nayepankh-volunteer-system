<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

if (!isset($_GET['id'])) {
    die("Volunteer ID not provided.");
}

$id = $_GET['id'];

$stmt = $conn->prepare(
    "SELECT * FROM volunteers WHERE volunteer_id = ?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$volunteer = $result->fetch_assoc();

if (!$volunteer) {
    die("Volunteer not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body>

<?php include '../includes/admin_sidebar.php'; ?>

<div class="admin-content">

    <div class="card shadow rounded-4">

        <div class="card-body p-5">

            <h2 class="mb-4">
                Volunteer Profile 👤
            </h2>

            <table class="table">

                <tr>
                    <th>Volunteer ID</th>
                    <td><?php echo $volunteer['volunteer_code']; ?></td>
                </tr>

                <tr>
                    <th>Full Name</th>
                    <td><?php echo htmlspecialchars($volunteer['full_name']); ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($volunteer['email']); ?></td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td><?php echo htmlspecialchars($volunteer['phone']); ?></td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td><?php echo $volunteer['gender']; ?></td>
                </tr>

                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo $volunteer['dob']; ?></td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td><?php echo htmlspecialchars($volunteer['address']); ?></td>
                </tr>

                <tr>
                    <th>Areas of Interest</th>
                    <td><?php echo htmlspecialchars($volunteer['skills']); ?></td>
                </tr>

                
                <tr>
                    <th>Availability</th>
                    <td><?php echo $volunteer['availability']; ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge bg-success">
                            <?php echo $volunteer['status']; ?>
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Registered On</th>
                    <td><?php echo $volunteer['created_at']; ?></td>
                </tr>

            </table>

            <a href="volunteers.php"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

</div>

</body>
</html>