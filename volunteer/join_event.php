
<?php
session_start();

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$volunteer_id = $_SESSION['volunteer_id'];
$event_id = $_GET['id'];

/* Prevent duplicate registrations */

$stmt = $conn->prepare("
    SELECT *
    FROM event_registrations
    WHERE volunteer_id=?
    AND event_id=?
");

$stmt->bind_param(
    "ii",
    $volunteer_id,
    $event_id
);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {

    $stmt = $conn->prepare("
        INSERT INTO event_registrations
        (
            volunteer_id,
            event_id
        )
        VALUES (?, ?)
    ");

    $stmt->bind_param(
        "ii",
        $volunteer_id,
        $event_id
    );

    $stmt->execute();
}

header("Location: my_events.php");
exit();
?>

