<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php'); // Redirige al login si no está autenticado
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php'); // Redirige al login después de cerrar sesión
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Welcome</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
        <h2 class="text-2xl font-semibold mb-4">Welcome, <?= htmlspecialchars($correct_username) ?>!</h2>
        <a href="welcome.php?logout=true" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</a>
    </div>
</body>
</html>
    