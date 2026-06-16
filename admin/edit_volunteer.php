<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$id = $_GET['id'];

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
<html>
<head>
    <title>Edit Volunteer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body>

<?php include '../includes/admin_sidebar.php'; ?>

<div class="admin-content">

    <div class="card shadow rounded-4">

        <div class="card-body p-4">

            <h3>Edit Volunteer</h3>

            <form action="update_volunteer.php" method="POST">

                <input type="hidden"
                       name="id"
                       value="<?php echo $volunteer['volunteer_id']; ?>">

                <div class="mb-3">
                    <label>Full Name</label>

                    <input type="text"
                           name="full_name"
                           class="form-control"
                           value="<?php echo htmlspecialchars($volunteer['full_name']); ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?php echo htmlspecialchars($volunteer['email']); ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label>Phone</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="<?php echo htmlspecialchars($volunteer['phone']); ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label>Availability</label>

                    <input type="text"
                           name="availability"
                           class="form-control"
                           value="<?php echo htmlspecialchars($volunteer['availability']); ?>"
                           required>
                </div>

                <button class="btn btn-success">
                    Update Volunteer
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>