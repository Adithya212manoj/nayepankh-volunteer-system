```php
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$event_date = $_POST['event_date'];
$location = $_POST['location'];
$required = $_POST['required_volunteers'];

$stmt = $conn->prepare("
    INSERT INTO events
    (
        title,
        description,
        event_date,
        location,
        required_volunteers
    )
    VALUES (?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "ssssi",
    $title,
    $description,
    $event_date,
    $location,
    $required
);

$stmt->execute();

header("Location: events.php");
exit();
?>
```
