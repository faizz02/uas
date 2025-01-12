<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(bckgrd.jpg) center/cover no-repeat fixed;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }
        .success-container {
            text-align: center;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            box-sizing: border-box;
        }
        .success-container h1 {
            font-size: 2.25rem;
            margin-bottom: 15px;
            color: #333333;
        }
        .success-container p {
            font-size: 1rem;
            margin-bottom: 20px;
            color: #555555;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Registration Successful!</h1>
        <p>Thank you for registering. Your account has been created successfully.</p>
        <a href="index.php" class="btn btn-custom btn-lg">Go to Login</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
