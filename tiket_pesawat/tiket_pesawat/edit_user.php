<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM users WHERE id = $id"));

if (!$user) {
    echo "<script>alert('User tidak ditemukan'); window.location='index.php';</script>";
    exit;
}

if (isset($_POST['reset'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $update = mysqli_query($koneksi, "UPDATE users SET password='$password' WHERE id=$id");

    if ($update) {
        echo "<div class='message' style='color:green;'>Password berhasil diupdate! <a href='login.php'>Login di sini</a></div>";
    } else {
        echo "<div class='message' style='color:red;'>Gagal update password.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #00c6ff, rgb(24, 122, 242));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[readonly] {
            background-color: #f0f0f0;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: rgb(91, 159, 242);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #005ecb;
        }

        .message {
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #0072ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Reset Password</h2>
        <form method="post">
            <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" readonly>
            <input type="password" name="password" placeholder="Password Baru" required>
            <button type="submit" name="reset">Reset Password</button>
        </form>

        <p><a href="index.php">Kembali ke Dashboard</a></p>
    </div>

</body>

</html>
