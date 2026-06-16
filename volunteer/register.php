<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Volunteer | NayePankh</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="registration-section py-5">

    <div class="container">

        <div class="registration-card mx-auto">

            <div class="text-center mb-4">

                <h2 class="fw-bold">Become a Volunteer</h2>

                <p class="text-muted">
                    Thank you for choosing to make a difference.
                    Please share a few details to begin your volunteering journey.
                </p>

            </div>

            <form action="process_register.php" method="POST">

                <!-- Personal Information -->
                <h5 class="section-title">
                    <i class="fas fa-user me-2"></i>
                    Personal Information
                </h5>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name</label>

                        <input type="text"
                               name="full_name"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Address</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>

                        <input type="text"
                               name="phone"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gender</label>

                        <select name="gender"
                                class="form-select"
                                required>

                            <option value="">Select</option>

                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>

                        </select>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Date of Birth</label>

                        <input type="date"
                               name="dob"
                               class="form-control"
                               required>
                    </div>

                </div>

                <!-- Address -->
                <h5 class="section-title">
                    <i class="fas fa-location-dot me-2"></i>
                    Address
                </h5>

                <div class="mb-4">

                    <textarea name="address"
                              rows="3"
                              class="form-control"
                              required></textarea>

                </div>

                <!-- Volunteer Details -->
                <h5 class="section-title">
                    <i class="fas fa-seedling me-2"></i>
                    Volunteer Information
                </h5>

                <div class="mb-3">

                    <label class="form-label">
                        Areas of Interest
                    </label>

                    

<div class="row">

    <div class="col-md-6">
        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="skills[]"
                   value="Education">

            <label class="form-check-label">
                Education
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="skills[]"
                   value="Healthcare">

            <label class="form-check-label">
                Healthcare
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="skills[]"
                   value="Environment">

            <label class="form-check-label">
                Environment
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="skills[]"
                   value="Fundraising">

            <label class="form-check-label">
                Fundraising
            </label>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="skills[]"
                   value="Event Management">

            <label class="form-check-label">
                Event Management
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="skills[]"
                   value="Social Media">

            <label class="form-check-label">
                Social Media
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   name="skills[]"
                   value="Community Outreach">

            <label class="form-check-label">
                Community Outreach
            </label>
        </div>
    </div>

</div>
                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Availability
                    </label>

                    <select name="availability"
                            class="form-select"
                            required>

                        <option value="">Select</option>

                        <option>Weekdays</option>
                        <option>Weekends</option>
                        <option>Flexible</option>

                    </select>

                </div>

                <!-- Account Setup -->
                <h5 class="section-title">
                    <i class="fas fa-lock me-2"></i>
                    Account Setup
                </h5>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Confirm Password
                        </label>

                        <input type="password"
                               name="confirm_password"
                               class="form-control"
                               required>

                    </div>

                </div>

                <div class="form-check mb-4">

                    <input class="form-check-input"
                           type="checkbox"
                           required>

                    <label class="form-check-label">

                        I agree to the Terms and Conditions.

                    </label>

                </div>

                <button type="submit"
                        class="btn btn-success w-100">

                    Register as Volunteer

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>