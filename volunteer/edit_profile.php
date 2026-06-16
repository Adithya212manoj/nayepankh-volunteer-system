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

$selected_skills = explode(", ", $volunteer['skills']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body class="registration-section">

<div class="container py-5">

    <div class="registration-card mx-auto">

        <h2 class="mb-4">Edit Profile ✏️</h2>

        <form action="update_profile.php"
      method="POST"
      enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Phone Number</label>

                <input type="text"
                       name="phone"
                       class="form-control"
                       value="<?php echo htmlspecialchars($volunteer['phone']); ?>"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>

                <textarea name="address"
                          class="form-control"
                          rows="3"
                          required><?php echo htmlspecialchars($volunteer['address']); ?></textarea>
            </div>

            <div class="mb-3">

                <label class="form-label">
                    Areas of Interest
                </label>

                <?php
                $interests = [
                    "Education",
                    "Healthcare",
                    "Environment",
                    "Fundraising",
                    "Event Management",
                    "Social Media",
                    "Community Outreach"
                ];

                foreach($interests as $interest) {
                ?>

                    <div class="form-check">

                        <input class="form-check-input"
                               type="checkbox"
                               name="skills[]"
                               value="<?php echo $interest; ?>"

                               <?php
                               if(in_array($interest, $selected_skills)) {
                                   echo "checked";
                               }
                               ?>>

                        <label class="form-check-label">
                            <?php echo $interest; ?>
                        </label>

                    </div>

                <?php } ?>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Availability
                </label>

                <select name="availability"
                        class="form-select"
                        required>

                    <option value="Weekdays"
                        <?php if($volunteer['availability']=="Weekdays") echo "selected"; ?>>
                        Weekdays
                    </option>

                    <option value="Weekends"
                        <?php if($volunteer['availability']=="Weekends") echo "selected"; ?>>
                        Weekends
                    </option>

                    <option value="Flexible"
                        <?php if($volunteer['availability']=="Flexible") echo "selected"; ?>>
                        Flexible
                    </option>

                </select>

            </div>
<div class="mb-4">

    <label class="form-label">
        Profile Picture
    </label>

    <input type="file"
           name="profile_picture"
           class="form-control"
           accept=".jpg,.jpeg,.png">

</div>
            <button class="btn btn-success">
                Save Changes
            </button>

            <a href="profile.php"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

</body>
</html>