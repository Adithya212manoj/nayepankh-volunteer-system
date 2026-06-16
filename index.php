<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NayePankh Volunteer Portal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Impact Statistics -->
<section class="py-5 bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Impact</h2>
            <p class="text-muted">
                Together, we are creating meaningful change.
            </p>
        </div>

        <div class="row g-4 text-center">

            <div class="col-md-4">
                <div class="impact-card p-4">
                    <h2>500+</h2>
                    <p>Volunteers</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="impact-card p-4">
                    <h2>120+</h2>
                    <p>Campaigns</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="impact-card p-4">
                    <h2>1000+</h2>
                    <p>Lives Impacted</p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- Why Volunteer Section -->
<section class="py-5" id="about">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Volunteer With Us?</h2>

            <p class="text-muted">
                Become part of a community dedicated to creating positive change.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="why-card text-center p-4 h-100">
                    <i class="fas fa-heart fa-3x mb-3"></i>
                    <h5>Make a Difference</h5>
                    <p>
                        Contribute your time and skills to meaningful causes.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="why-card text-center p-4 h-100">
                    <i class="fas fa-book-open fa-3x mb-3"></i>
                    <h5>Learn New Skills</h5>
                    <p>
                        Gain valuable experiences and develop leadership abilities.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="why-card text-center p-4 h-100">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h5>Build Connections</h5>
                    <p>
                        Meet passionate people who share your commitment.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="why-card text-center p-4 h-100">
                    <i class="fas fa-hand-holding-heart fa-3x mb-3"></i>
                    <h5>Give Back</h5>
                    <p>
                        Strengthen communities through acts of kindness.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>
    <?php include 'includes/navbar.php'; ?>

    <section class="hero">
        <div class="container text-center">
            <h1>Be the Change. Volunteer with Purpose.</h1>

            <p>
                Join NayePankh Foundation and use your skills
                to create meaningful impact in communities.
            </p>

            <a href="volunteer/register.php" class="btn btn-success btn-lg me-3">
                Become a Volunteer
            </a>

            <a href="#about" class="btn btn-outline-light btn-lg">
                Learn More
            </a>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>