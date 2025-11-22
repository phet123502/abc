<?php
include "../config/config.php";
$projects = mysqli_query($conn, "SELECT * FROM projects");
while ($p = mysqli_fetch_assoc($projects)) {
    if ($p['utilized'] > $p['budget'] * 0.8 && $p['progress'] < 50) {
        mysqli_query($conn, "INSERT INTO anomalies (project_id, message) VALUES ({$p['id']}, 'High expenditure but low progress')");
    }
}
echo "Anomaly scan complete";
?>