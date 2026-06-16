
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$event_id = $_GET['id'];

$stmt = $conn->prepare("
    SELECT
        volunteers.full_name,
        volunteers.email,
        volunteers.phone,
        event_registrations.registered_at
    FROM event_registrations
    JOIN volunteers
        ON event_registrations.volunteer_id = volunteers.volunteer_id
    WHERE event_registrations.event_id = ?
");

$stmt->bind_param("i", $event_id);
$stmt->execute();

$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Event Participants</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>

<body>

<?php include '../includes/admin_sidebar.php'; ?>

<div class="admin-content">

    <h2>Event Participants 👥</h2>

    <div class="card shadow rounded-4">

        <div class="card-body">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registered On</th>

                    </tr>

                </thead>

                <tbody>

                <?php while($participant = mysqli_fetch_assoc($result)) { ?>

                    <tr>

                        <td>
                            <?php echo htmlspecialchars($participant['full_name']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($participant['email']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($participant['phone']); ?>
                        </td>

                        <td>
                            <?php echo date(
                                'd M Y',
                                strtotime($participant['registered_at'])
                            ); ?>
                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>

