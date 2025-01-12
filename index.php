<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login Page</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background: url(bckgrd.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: sans-serif;
    }
    .card {
        background: rgba(255, 255, 255, 0.85); 
        color: #000;
        border-radius: 15px;
    }
    .form-control {
        background: rgba(255, 255, 255, 0.5); 
        border: 1px solid #ccc;
        color: #000;
        font-weight: bold;
    }
    .form-control::placeholder {
        color: rgba(0, 0, 0, 0.6); 
    }
    .form-control:focus {
        background: rgba(255, 255, 255, 0.7);
        outline: none;
        box-shadow: 0 0 5px rgba(37, 117, 252, 0.8);
        border-color: #2575fc;
    }
    .btn-primary {
        background-color: #2575fc;
        border: none;
    }
    .btn-primary:hover {
        background-color: #1b5ed4;
    }
    a {
        color: #2575fc;
    }
    a:hover {
        color: #1b5ed4;
        text-decoration: underline;
    }
</style>

</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h1 class="text-center mb-4">LOGIN</h1>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope me-2"></i>Email
                </label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="fas fa-lock me-2"></i>Password
                </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            <div class="text-center mt-3">
                <p>Belum punya akun? <a href="regis.php">Registrasi disini</a></p>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-6mXBk7jSA4iFuAjwqIbjLoR/y2Y5X92UwcCH/CTZkknVx1g/CFTUyMDkxPlP1pBI" crossorigin="anonymous"></script>
</body>
</html>
