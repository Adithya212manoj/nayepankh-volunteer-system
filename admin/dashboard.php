```php
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

/* Statistics */

$total = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM volunteers"
);

$total_volunteers = mysqli_fetch_assoc($total)['total'];

$approved = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM volunteers WHERE status='Approved'"
);

$approved_count = mysqli_fetch_assoc($approved)['total'];

$pending = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM volunteers WHERE status='Pending'"
);

$pending_count = mysqli_fetch_assoc($pending)['total'];

$inactive = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM volunteers WHERE status='Inactive'"
);

$inactive_count = mysqli_fetch_assoc($inactive)['total'];
?>

<!DOCTYPE html>
<html>
<head>

    <title>Admin Dashboard | NayePankh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>

<body>

<?php include '../includes/admin_sidebar.php'; ?>

<div class="admin-content">

    <h2>
        Welcome,
        <?php echo htmlspecialchars($_SESSION['admin_name']); ?> 👋
    </h2>

    <p class="text-muted">
        Here's an overview of your volunteer portal.
    </p>

    <!-- Statistics Cards -->

    <div class="row mt-4">

        <div class="col-md-3 mb-3">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center">

                    <h6>Total Volunteers</h6>

                    <h2><?php echo $total_volunteers; ?></h2>

                </div>

            </div>

        </div>


        <div class="col-md-3 mb-3">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center">

                    <h6>Approved</h6>

                    <h2><?php echo $approved_count; ?></h2>

                </div>

            </div>

        </div>


        <div class="col-md-3 mb-3">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center">

                    <h6>Pending</h6>

                    <h2><?php echo $pending_count; ?></h2>

                </div>

            </div>

        </div>


        <div class="col-md-3 mb-3">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center">

                    <h6>Inactive</h6>

                    <h2><?php echo $inactive_count; ?></h2>

                </div>

            </div>

        </div>

    </div>


    <!-- Quick Actions -->

    <div class="card shadow rounded-4 mt-4">

        <div class="card-body">

            <h4>Quick Actions</h4>

            <a href="volunteers.php"
               class="btn btn-success me-2">

                👥 Manage Volunteers

            </a>

            <a href="export_csv.php"
               class="btn btn-outline-success">

                📄 Export Reports

            </a>

        </div>

    </div>

</div>

</body>
</html>
```
