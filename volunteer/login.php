<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Login | NayePankh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="registration-section py-5">

    <div class="container">

        <div class="registration-card mx-auto">

            <div class="text-center mb-4">

                <h2 class="fw-bold">Welcome Back 👋</h2>

                <p class="text-muted">
                    Continue your journey of creating impact with NayePankh.
                </p>

            </div>

            <form action="process_login.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           required>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <button type="submit"
                        class="btn btn-success w-100">

                    Login

                </button>

            </form>

            <div class="text-center mt-4">

                <p class="mb-0">
                    New Volunteer?
                    <a href="register.php">
                        Register Here
                    </a>
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>