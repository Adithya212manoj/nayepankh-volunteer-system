
<?php
session_start();

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body class="registration-section">

<div class="container py-5">

    <div class="registration-card mx-auto">

        <h2 class="mb-4">
            Change Password 🔐
        </h2>

        <form action="update_password.php" method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Current Password
                </label>

                <input type="password"
                       name="current_password"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    New Password
                </label>

                <input type="password"
                       name="new_password"
                       class="form-control"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Confirm New Password
                </label>

                <input type="password"
                       name="confirm_password"
                       class="form-control"
                       required>

            </div>

            <button class="btn btn-success">
                Update Password
            </button>

            <a href="dashboard.php"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

</body>
</html>
