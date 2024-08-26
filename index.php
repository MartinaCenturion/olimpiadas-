<?php
session_start(); // Inicia la sesión

// Simulación de productos
$products = [
    ["id" => 1, "name" => "Producto 1(ejemplo)", "description" => "breve descripcion del producto 1.", "price" => 29.99, "image" => "product1.jpg"],
    ["id" => 2, "name" => "Producto 2(ejemplo)", "description" => "breve descripcion del producto 2.", "price" => 39.99, "image" => "product2.jpg"],
    ["id" => 3, "name" => "Producto 3(ejemplo)", "description" => "breve descripcion del producto 3.", "price" => 49.99, "image" => "product3.jpg"],
    ["id" => 4, "name" => "Producto 4(ejemplo)", "description" => "breve descripcion del producto 4.", "price" => 59.99, "image" => "product4.jpg"],
    ["id" => 5, "name" => "Producto 5(ejemplo)", "description" => "breve descripcion del producto 5.", "price" => 69.99, "image" => "product5.jpg"],
];

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Indumentaria Genio</title>
</head>
<body>
    <header>
        <div class="header-content">
            <img src="logo-removebg-preview.png" alt="Boca Juniors Logo" class="logo">
            <div class="header-info">
                <h1>Indumentaria Genio</h1>
            </div>
            <div class="auth-links">
                <?php if ($username): ?>
                    <span>Welcome, <?= htmlspecialchars($username) ?>!</span>
                    <form action="logout.php" method="post">
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="login.php" class="auth-link">Iniciar</a>
                    <a href="register.php" class="auth-link">Registrate aqui</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <main>
        <section id="featured-products">
            <h2>Productos Disponibles</h2>
            <div class="products-container">
                <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="imagen1.jpg" alt="<?= $product['name'] ?>">
                    <h3><?= $product['name'] ?></h3>
                    <p><?= $product['description'] ?></p>
                    <p class="price">Precio: $<?= number_format($product['price'], 2) ?></p>
                    <button class="add-to-cart" data-id="<?= $product['id'] ?>" data-name="<?= $product['name'] ?>" data-price="<?= $product['price'] ?>">Añadir al carrito</button>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section id="cart">
            <h2>Tu carrito</h2>
            <div id="cart-items"></div>
            <p id="total-price">Total: $0.00</p>
            <button id="checkout">Finalizar compra</button>
            <p id="thank-you-message" style="display: none; color: #ffd700; font-weight: bold;">Thank you for your purchase!</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Indumentaria Genio</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
