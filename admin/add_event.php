```php
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body>

<?php include '../includes/admin_sidebar.php'; ?>

<div class="admin-content">

    <div class="card shadow rounded-4">

        <div class="card-body">

            <h2>Create Event 📅</h2>

            <form action="save_event.php"
                  method="POST">

                <div class="mb-3">

                    <label>Event Title</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Description</label>

                    <textarea name="description"
                              class="form-control"
                              rows="4"
                              required></textarea>

                </div>

                <div class="mb-3">

                    <label>Event Date</label>

                    <input type="date"
                           name="event_date"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Location</label>

                    <input type="text"
                           name="location"
                           class="form-control"
                           required>

                </div>

                <div class="mb-4">

                    <label>Required Volunteers</label>

                    <input type="number"
                           name="required_volunteers"
                           class="form-control"
                           required>

                </div>

                <button class="btn btn-success">

                    Create Event

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>
```
