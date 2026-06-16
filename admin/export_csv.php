
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="volunteers.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, [
    'Volunteer ID',
    'Name',
    'Email',
    'Phone',
    'Skills',
    'Availability',
    'Status'
]);

$result = mysqli_query(
    $conn,
    "SELECT * FROM volunteers ORDER BY volunteer_id DESC"
);

while ($row = mysqli_fetch_assoc($result)) {

    fputcsv($output, [
        $row['volunteer_code'],
        $row['full_name'],
        $row['email'],
        $row['phone'],
        $row['skills'],
        $row['availability'],
        $row['status']
    ]);
}

fclose($output);
exit();
?>
```
