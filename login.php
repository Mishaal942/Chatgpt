<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = json_decode(file_get_contents('users.json'), true) ?? [];
    $name = $_POST['name'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['name'] === $name && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $name;
            header('Location: index.php');
            exit;
        }
    }

    echo "Invalid login!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right, #232526, #414345);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }
        form {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }
        h2 {
            text-align: center;
            color: #10a37f;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
            background: #2c2c2c;
            color: white;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #10a37f;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: #0e8266;
        }
    </style>
</head>
<body>
<form method="POST">
    <h2>Login to Chat</h2>
    <input type="text" name="name" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
</body>
</html>
