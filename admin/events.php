<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$result = mysqli_query(
    $conn,
    "SELECT * FROM events ORDER BY event_date ASC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Events</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body>

<?php include '../includes/admin_sidebar.php'; ?>

<div class="admin-content">

    <h2>Event Management 📅</h2>

    <a href="add_event.php"
   style="background:grey;
          color:white;
          padding:15px 25px;
          border-radius:10px;
          text-decoration:none;
          display:inline-block;
          margin-bottom:20px;">

     CREATE EVENT

</a>
    <p class="text-muted">
    Manage your NGO events.
</p>
    <div class="card shadow rounded-4">

        <div class="card-body">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Volunteers Needed</th>
<th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>

                        <td>
                            <?php echo htmlspecialchars($row['title']); ?>
                        </td>

                        <td>
                            <?php echo $row['event_date']; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['location']); ?>
                        </td>

                        <td>
    <?php echo $row['required_volunteers']; ?>
</td>

<td>

    <a href="view_participants.php?id=<?php echo $row['event_id']; ?>"
       class="btn btn-sm btn-info">

        View Participants

    </a>

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