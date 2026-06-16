
<?php
session_start();

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$volunteer_id = $_SESSION['volunteer_id'];

$stmt = $conn->prepare("
    SELECT
        events.*,
        event_registrations.registered_at
    FROM event_registrations
    JOIN events
        ON event_registrations.event_id = events.event_id
    WHERE event_registrations.volunteer_id = ?
    ORDER BY events.event_date ASC
");

$stmt->bind_param("i", $volunteer_id);
$stmt->execute();

$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>

    <title>My Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>

<body class="registration-section">

<div class="container py-5">

    <div class="registration-card mx-auto">

        <h2 class="mb-4">
            My Events 🎉
        </h2>

        <?php if($result->num_rows > 0) { ?>

            <?php while($event = mysqli_fetch_assoc($result)) { ?>

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
                            <strong>Registered On:</strong>
                            <?php echo date(
                                'd M Y',
                                strtotime($event['registered_at'])
                            ); ?>
                        </p>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="alert alert-info">

                You haven't joined any events yet.

            </div>

        <?php } ?>

        <a href="events.php"
           class="btn btn-success">

            Browse More Events

        </a>

    </div>

</div>

</body>
</html>

