```php
<?php
session_start();

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$id = $_SESSION['volunteer_id'];

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

/* Get current password hash */

$stmt = $conn->prepare(
    "SELECT password FROM volunteers WHERE volunteer_id=?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

/* Check current password */

if (!password_verify($current_password, $user['password'])) {

    die("Current password is incorrect.");

}

/* Check password confirmation */

if ($new_password !== $confirm_password) {

    die("New passwords do not match.");

}

/* Update password */

$new_hash = password_hash(
    $new_password,
    PASSWORD_DEFAULT
);

$stmt = $conn->prepare(
    "UPDATE volunteers SET password=? WHERE volunteer_id=?"
);

$stmt->bind_param(
    "si",
    $new_hash,
    $id
);

$stmt->execute();

echo "
<script>
alert('Password updated successfully!');
window.location='dashboard.php';
</script>
";
?>
```
