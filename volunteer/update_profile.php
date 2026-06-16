<?php
session_start();

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$id = $_SESSION['volunteer_id'];

$stmt = $conn->prepare(
    "SELECT profile_picture
     FROM volunteers
     WHERE volunteer_id=?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$volunteer = $result->fetch_assoc();

$phone = trim($_POST['phone']);
$address = trim($_POST['address']);

$skills = isset($_POST['skills'])
    ? implode(", ", $_POST['skills'])
    : "";
$availability = $_POST['availability'];
$profile_picture = $volunteer['profile_picture'] ?? null;

if (isset($_FILES['profile_picture']) &&
    $_FILES['profile_picture']['error'] == 0) {

    $extension = pathinfo(
        $_FILES['profile_picture']['name'],
        PATHINFO_EXTENSION
    );

    $filename = "profile_" .
                time() .
                "." .
                $extension;

    move_uploaded_file(
        $_FILES['profile_picture']['tmp_name'],
        "../uploads/profiles/" . $filename
    );

    $profile_picture = $filename;
}

$stmt = $conn->prepare("
    UPDATE volunteers
    SET
        phone=?,
        address=?,
        skills=?,
        availability=?,
        profile_picture=?
    WHERE volunteer_id=?
");
$stmt->bind_param(
    "sssssi",
    $phone,
    $address,
    $skills,
    $availability,
    $profile_picture,
    $id
);

$stmt->execute();

header("Location: profile.php");
exit();
?>