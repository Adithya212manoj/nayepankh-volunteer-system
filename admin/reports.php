<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body>

<?php include '../includes/admin_sidebar.php'; ?>

<div class="admin-content">

    <h2>Reports 📊</h2>

    <p class="text-muted">
        Download volunteer reports and participation data.
    </p>

    <div class="card shadow rounded-4">

        <div class="card-body">

            <a href="export_csv.php"
               class="btn btn-success">

                📄 Export Volunteer Report

            </a>

        </div>

    </div>

</div>

</body>
</html>