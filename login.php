<?php
session_start();
require 'inc_header.php'; // Panggil file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengecek username dan password
    $sql = "SELECT * FROM users WHERE username = ? AND password = MD5(?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika login berhasil, buat session
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect ke dashboard
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;


            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h1 {
            margin-bottom: 20px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #666666;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .btn-login {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }
        .login-container {
    position: relative;
    width: 80%;
    /* Sesuaikan ukuran foto */
    margin: 20px auto;
    border: 5px solid #ffffff;
    /* Warna bingkai */
    border-radius: 15px;
    /* Membulatkan sudut bingkai */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    /* Efek bayangan */
    overflow: hidden;
    border-radius: 15px;
    transition: transform 0.5s ease;
    display: flex;
    justify-content: center;
    /* Memusatkan secara horizontal */
    align-items: center;
    /* Memusatkan secara vertikal */
    text-align: center;
  max-width: 800px;
  margin: 0 auto; /* Memusatkan container */
        }
        
    </style>
</head>

<body>
    <br>
    <div class="login-container">

        <?php if (isset($error))
            echo "<p style='color:red;'>$error</p>"; ?>
        <div class="login-container">
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
                <?php if (isset($error))
                    echo "<p class='error-message'>$error</p>"; ?>
            </form>
        </div>
    </div>
    <br>


</body>

</html>