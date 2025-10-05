<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = json_decode(file_get_contents('users.json'), true) ?? [];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    foreach ($users as $user) {
        if ($user['name'] === $name) {
            echo "User already exists!";
            exit;
        }
    }

    $users[] = ['name' => $name, 'password' => $password];
    file_put_contents('users.json', json_encode($users));
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }
        form {
            background: #1f1f1f;
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
            background: #2d2d2d;
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
    <h2>Create an Account</h2>
    <input type="text" name="name" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
</form>
</body>
</html>
