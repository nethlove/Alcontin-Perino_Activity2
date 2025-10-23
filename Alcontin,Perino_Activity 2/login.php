<?php
session_start();
require_once('connection.php');
require_once('classes/User.php');

$user = new User($connect);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Find user by username
    $stmt = $connect->prepare("SELECT * FROM users_table WHERE username = ? LIMIT 1");
    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['password'] == $password) {
        // Set session variables
        $_SESSION['first_name'] = $result['first_name'];
        $_SESSION['last_name'] = $result['last_name'];
        $_SESSION['username'] = $result['username'];

        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            overflow: hidden;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #007bff, #6610f2);
            position: relative;
        }

        /* Floating circles background */
        .floating-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            animation: float 10s infinite ease-in-out;
        }

        .circle:nth-child(1) { width: 80px; height: 80px; left: 10%; animation-delay: 0s; }
        .circle:nth-child(2) { width: 120px; height: 120px; left: 70%; animation-delay: 2s; }
        .circle:nth-child(3) { width: 60px; height: 60px; left: 40%; animation-delay: 4s; }
        .circle:nth-child(4) { width: 100px; height: 100px; left: 85%; animation-delay: 6s; }
        .circle:nth-child(5) { width: 90px; height: 90px; left: 20%; animation-delay: 8s; }

        @keyframes float {
            0% { transform: translateY(100vh) scale(0.8); opacity: 0.6; }
            50% { opacity: 1; }
            100% { transform: translateY(-10vh) scale(1.2); opacity: 0; }
        }

        /* Login Box */
        .login-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 350px;
            text-align: center;
            z-index: 10;
            position: relative;
            animation: slide 1s ease-in-out;
        }

        @keyframes slide {
            from { transform: translateY(-40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        h3 {
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
        }

        .btn-primary {
            border-radius: 10px;
            font-weight: bold;
            background: linear-gradient(90deg, #007bff, #6610f2);
            border: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .alert {
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="floating-bg">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <div class="login-box">
        <h3 class="mb-3">User Login</h3>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger py-2"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3 text-start">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username" required>
            </div>
            <div class="mb-3 text-start">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
