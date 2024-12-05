<?php
session_start();
include('db.php'); // Menghubungkan dengan file database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil data dari database berdasarkan username dan email
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Cek apakah password sesuai
        if (password_verify($password, $user['password'])) {
            // Simpan username dan email ke dalam session
            $_SESSION['username'] = $user['username'];
            
            // Redirect ke halaman beranda setelah login berhasil
            header('Location: index.php');
            exit;
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username atau email tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/img/stm-removebg-preview.png" rel="icon">
    <link href="assets/img/stm-removebg-preview.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <title>LOGIN</title>
    
    
    <style>
   * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0; 
    background-image: url('assets/img/ssim.png'); /* Pastikan path ini benar */
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
}

.login-box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; /* Tambahkan ini untuk meratakan isi secara horizontal */
    width: 440px;
    padding: 30px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.login-header {
    text-align: center;
    margin-bottom: 40px;
}

.login-header header {
    color: #333;
    font-size: 30px;
    font-weight: 600;
}

.input-box {
    width: 100%; 
}

.input-box .input-field {
    width: 100%;
    height: 50px;
    font-size: 16px;
    padding: 0 20px;
    margin-bottom: 20px;
    border-radius: 25px;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    outline: none;
    transition: all 0.3s ease;
}

.input-box .input-field:focus {
    border-color: #0ba2cc;
    box-shadow: 0 4px 12px rgba(11, 162, 204, 0.3);
}

.input-box .input-field::placeholder {
    font-weight: 500;
    color: #888;
}

.forgot {
    display: flex;
    justify-content: start;
    color: #555;
}

.forgot a {
    text-decoration: none;
    color: #555;
    transition: color 0.3s;
}

.forgot a:hover {
    color: #050b0c;
}
.forgot {
    display: flex; /* Gunakan Flexbox untuk tata letak horizontal */
    margin-bottom: 30px;
    font-size: 14px;
    color: #555;
}

.input-submit {
    width: 100%; /* Tambahkan agar elemen submit menyesuaikan lebar parent */
    position: relative;
}

.submit-btn {
    width: 100%;
    height: 50px;
    background: #0ba2cc;
    border: none;
    border-radius: 25px;
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    background: #007b99;
    transform: scale(1.05);
}

.sign-up-link {
    text-align: center;
    font-size: 15px;
    margin-top: 20px;
    color: #333;
    font-weight: 600;
}

.sign-up-link a {
    text-decoration: none;
    color: #0ba2cc;
    transition: color 0.3s;
}

.sign-up-link a:hover {
    color: #007b99;
}



    </style>
</head>
<body>
    <body>
        <div class="login-box">
            <div class="login-header">
                <header>Login</header>
            </div>
            <form action="admin.php" method="post">
            <div class="input-box">
                <input type="text" class="input-field" placeholder="username" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="password" autocomplete="off" required>
            </div>
            
            <div class="input-submit">
                <button type="submit"class="submit-btn" id="submit">Sign In</button>
            </div>
</form>
        </div>
    </body>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
