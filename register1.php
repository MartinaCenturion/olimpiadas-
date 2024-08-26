<?php
session_start();

// Simulamos una base de datos de usuarios
$users = [
    'user1' => 'password123',
    'user2' => 'mypassword',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username])) {
        $error = 'Username already exists.';
    } else {
        // En una aplicación real, aquí guardarías los datos en la base de datos
        $_SESSION['username'] = $username;
        header('Location: welcome.php'); // Redirige a una página de bienvenida
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <?php if (isset($error)): ?>
        <p class="text-red-500 mb-4"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="register.php" method="post" class="space-y-4">
            <input type="text" name="username" placeholder="Username" class="w-full p-3 border border-gray-300 rounded-lg" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-lg" required>
            <button type="submit" class="w-full py-3 bg-green-500 text-white rounded-lg hover:bg-green-600">Register</button>
        </form>
        <p class="mt-4 text-center">
            Already have an account? <a href="login.php" class="text-blue-500 hover:underline">Login here</a>
        </p>
    </div>
</body>
</html>
