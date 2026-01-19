<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6dd5ed, #2193b0);
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 30px;
            color: #2193b0;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: #2193b0;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #176B87;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .register-link {
            margin-top: 15px;
            display: block;
            color: #333;
        }

        .register-link a {
            color: #2193b0;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form method="post" autocomplete="off">
            <input type="text" name="username" placeholder="Username" required autocomplete="off">
            <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
            <button type="submit" name="login">Login</button>
        </form>

        <?php
        if (isset($_POST['login'])) {
            include 'koneksi.php';

            $username = mysqli_real_escape_string($koneksi, $_POST['username']);
            $password = $_POST['password'];

            $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
            if ($query && mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_assoc($query);

                if (password_verify($password, $data['password'])) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['role'] = $data['role'];

                    if ($data['role'] == 'admin') {
                        header("Location: indexx.php");
                    } else {
                        header("Location: index.php");
                    }
                    exit();
                } else {
                    echo "<div class='error-message'>Password salah.</div>";
                }
            } else {
                echo "<div class='error-message'>Username tidak ditemukan.</div>";
            }
        }
        ?>

        <div class="register-link">
            <a href="register.php">Register</a> |
            <a href="reset.php">Lupa Password?</a>
        </div>
    </div>

</body>

</html>
