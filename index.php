<?php
session_start();
include __DIR__ . "/config.php";   // <-- DIRECT METHOD

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $data = mysqli_fetch_assoc($result);

        if ($password === $data['password']) {

            $_SESSION['role'] = $data['role'];
            $_SESSION['user_id'] = $data['id'];

            if ($data['role'] == 'admin') {
                header("Location: " . __DIR__ . "/admin-dashboard.php");
            }
            else if ($data['role'] == 'district') {
                header("Location: dashboard.php");
            }
            else if ($data['role'] == 'auditor') {
                header("Location: " . __DIR__ . "/auditor-dashboard.php");
            }
            exit;

        } else {
            $error = "Incorrect Password!";
        }

    } else {
        $error = "Email not found!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>NHM Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="col-md-4 mx-auto card p-4 shadow">

<h4 class="text-center">NHM Login</h4>

<?php if(isset($error)) echo "<p class='text-danger'>$error</p>"; ?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
    <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
    <button class="btn btn-primary w-100" name="login">Login</button>
</form>

</div>
</div>

</body>
</html>
