

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">Admin</h2>
        <form action="loginController.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <input type="checkbox" onclick="togglePassword()"> Show Password
            </div>
            <?php if (!empty($errorMessage)) : ?>
                <div class="alert alert-danger" role="alert" id="errorMessage">
                    <?= htmlspecialchars($errorMessage) ?>
                </div>
            <?php endif; ?>
            <div class="d-grid gap-2 mt-5">
                <button class="btn btn-primary" type="submit">login</button>
                <a href="index.php">Masuk sebagai Tamu</a>
            </div>
        </form>
    </div>

    <script>
        // Fungsi untuk menyembunyikan/menampilkan password
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        // Menghilangkan pesan error setelah 5 detik (5000 ms)
        setTimeout(function() {
            var errorMessage = document.getElementById('errorMessage');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000);
    </script>
</body>

</html>