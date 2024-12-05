<?php
session_start();

// Cek apakah user sudah admin
if (!isset($_SESSION['username'])) {
    header('Location: tampilan.php');
    exit;
}

// Mendapatkan username dan email dari session
$username = $_SESSION['username'];

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>okeeeeeeeeeeeeeee</h1>
<?php echo "$username";?>
</body>
</html>
