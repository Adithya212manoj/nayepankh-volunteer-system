<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | NayePankh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="admin-login-bg">

<div class="container py-5">

    <div class="registration-card mx-auto">

        <div class="text-center mb-4">

            <h2 class="fw-bold">NayePankh Admin</h2>

            <p class="text-muted">
                Secure access to the volunteer management portal.
            </p>

        </div>

        <form action="process_login.php" method="POST">

            <div class="mb-3">

                <label class="form-label">Email Address</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">Password</label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>

            </div>

            <button class="btn btn-success w-100">

                Login as Admin

            </button>

        </form>

    </div>

</div>

</body>
</html>