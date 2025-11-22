<?php
session_start();
include "config.php";
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'district') { header("location: login.php"); }
$projects = mysqli_query($conn, "SELECT * FROM projects WHERE district_id = 1");
?>
<!DOCTYPE html><html><head>
<title>District Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head><body>
<div class="container mt-4">
<h3>District Dashboard</h3>
<table class="table table-bordered mt-3">
<thead><tr><th>Project Name</th><th>Budget</th><th>Utilized</th><th>Status</th><th>Details</th></tr></thead>
<tbody>
<?php while ($row = mysqli_fetch_assoc($projects)) { ?>
<tr>
<td><?= $row['name'] ?></td>
<td>₹<?= $row['budget'] ?></td>
<td>₹<?= $row['utilized'] ?></td>
<td><?= $row['status'] ?></td>
<td><a href="project-details.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">View</a></td>
</tr><?php } ?>
</tbody></table></div></body></html>
