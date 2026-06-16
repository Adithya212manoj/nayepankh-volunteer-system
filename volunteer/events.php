
<?php
session_start();

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$events_result = mysqli_query(
    $conn,
    "SELECT * FROM events ORDER BY event_date ASC"
);

$volunteer_id = $_SESSION['volunteer_id'];

$stmt = $conn->prepare("
    SELECT status
    FROM volunteers
    WHERE volunteer_id=?
");

$stmt->bind_param("i", $volunteer_id);
$stmt->execute();

$status_result = $stmt->get_result();

$volunteer = $status_result->fetch_assoc();

if ($volunteer['status'] != 'Approved') {

    die("Your account is awaiting approval.");

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upcoming Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body class="registration-section">

<div class="container py-5">

    <div class="registration-card mx-auto">

        <h2 class="mb-4">
            Upcoming Events 📅
        </h2>

        <?php while($event = mysqli_fetch_assoc($events_result)) { ?>

            <div class="card mb-3 shadow-sm">

                <div class="card-body">

                    <h4>
                        <?php echo htmlspecialchars($event['title']); ?>
                    </h4>

                    <p>
                        <?php echo htmlspecialchars($event['description']); ?>
                    </p>

                    <p>
                        <strong>Date:</strong>
                        <?php echo $event['event_date']; ?>
                    </p>

                    <p>
                        <strong>Location:</strong>
                        <?php echo htmlspecialchars($event['location']); ?>
                    </p>

                    <p>
                        <strong>Volunteers Needed:</strong>
                        <?php echo $event['required_volunteers']; ?>
                    </p>

                    <a href="join_event.php?id=<?php echo $event['event_id']; ?>"
                       class="btn btn-success">

                        Join Event

                    </a>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

</body>
</html>

