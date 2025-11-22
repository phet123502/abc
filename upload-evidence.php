<?php
session_start();
include "../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_id = $_POST['project_id'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $file = $_FILES['media']['name'];
    $tmp = $_FILES['media']['tmp_name'];
    $folder = "../public/uploads/" . $file;
    move_uploaded_file($tmp, $folder);
    mysqli_query($conn, "INSERT INTO media (project_id, file_path, lat, lng) VALUES ('$project_id', '$file', '$lat', '$lng')");
    echo "<script>alert('Uploaded Successfully'); window.location='auditor-dashboard.php';</script>";
}
?>