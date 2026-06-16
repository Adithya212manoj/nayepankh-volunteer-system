
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$search = "";

if (isset($_GET['search'])) {

    $search = trim($_GET['search']);

    $stmt = $conn->prepare("
        SELECT *
        FROM volunteers
        WHERE full_name LIKE ?
        OR email LIKE ?
        ORDER BY volunteer_id DESC
    ");

    $term = "%$search%";

    $stmt->bind_param("ss", $term, $term);
    $stmt->execute();

    $result = $stmt->get_result();

} else {

    $result = mysqli_query(
        $conn,
        "SELECT * FROM volunteers ORDER BY volunteer_id DESC"
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteers | NayePankh Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body>

<?php include '../includes/admin_sidebar.php'; ?>

<div class="admin-content">

    <h2>Volunteer Management 👥</h2>

    <p class="text-muted">
        View and manage registered volunteers.
    </p>

    <!-- Search -->
    <form class="mb-4" method="GET">

        <div class="input-group">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search by name or email..."
                   value="<?php echo htmlspecialchars($search); ?>">

            <button class="btn btn-success">
                Search
            </button>

        </div>

    </form>

   
   

    <!-- Volunteer Table -->
    <div class="card shadow rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Volunteer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Interests</th>
                            <th>Availability</th>
                            <th>Status</th>
                            <th style="width: 220px;">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php while($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>

                            <td><?php echo $row['volunteer_id']; ?></td>

                            <td><?php echo $row['volunteer_code']; ?></td>

                            <td><?php echo htmlspecialchars($row['full_name']); ?></td>

                            <td><?php echo htmlspecialchars($row['email']); ?></td>

                            <td><?php echo htmlspecialchars($row['phone']); ?></td>

                            <td><?php echo htmlspecialchars($row['skills']); ?></td>

                            <td><?php echo htmlspecialchars($row['availability']); ?></td>

                            <td>

                                <?php
                                if ($row['status'] == 'Approved') {
                                    echo '<span class="badge bg-success">Approved</span>';
                                } elseif ($row['status'] == 'Pending') {
                                    echo '<span class="badge bg-warning text-dark">Pending</span>';
                                } else {
                                    echo '<span class="badge bg-secondary">Inactive</span>';
                                }
                                ?>

                            </td>

                            <td class="text-nowrap">

                                <a href="view_volunteer.php?id=<?php echo $row['volunteer_id']; ?>"
   style="background:#4A7C59;
          color:#FDF6EC;
          padding:6px 12px;
          border-radius:8px;
          text-decoration:none;
          display:inline-block;">

    View

</a>

                                <?php if($row['status'] != 'Approved') { ?>

                                    <a href="update_status.php?id=<?php echo $row['volunteer_id']; ?>&status=Approved"
   style="background:#4A7C59;
          color:white;
          padding:6px 12px;
          border-radius:8px;
          text-decoration:none;
          display:inline-block;">
    Approve
</a>

                                <?php } ?>

                                <?php if($row['status'] == 'Approved') { ?>

                                    <a href="update_status.php?id=<?php echo $row['volunteer_id']; ?>&status=Inactive"
   style="background:#D4A373;
          color:white;
          padding:6px 12px;
          border-radius:8px;
          text-decoration:none;
          display:inline-block;">
    Deactivate
</a>
                                <?php } ?>

                                <a href="delete_volunteer.php?id=<?php echo $row['volunteer_id']; ?>"
   onclick="return confirm('Delete this volunteer account?')"
   style="background:#C97C5D;
          color:white;
          padding:6px 12px;
          border-radius:8px;
          text-decoration:none;
          display:inline-block;">
    Delete
</a>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>

