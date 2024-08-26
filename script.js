document.addEventListener('DOMContentLoaded', () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    const renderCart = () => {
        const cartItemsContainer = document.getElementById('cart-items');
        const totalPriceContainer = document.getElementById('total-price');
        cartItemsContainer.innerHTML = '';
        let total = 0;

        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;

            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <h3>${item.name}</h3>
                <p>Quantity: ${item.quantity}</p>
                <p>Unit Price: $${item.price.toFixed(2)}</p>
                <p>Total Price: $${itemTotal.toFixed(2)}</p>
                <button class="remove-from-cart" data-id="${item.id}">Remove</button>
            `;
            cartItemsContainer.appendChild(cartItem);
        });

        totalPriceContainer.textContent = `Total: $${total.toFixed(2)}`;
    };

    const updateCart = () => {
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    };

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (event) => {
            const id = event.target.getAttribute('data-id');
            const name = event.target.getAttribute('data-name');
            const price = parseFloat(event.target.getAttribute('data-price'));

            const existingItem = cart.find(item => item.id == id);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ id, name, price, quantity: 1 });
            }

            updateCart();
        });
    });

    document.getElementById('cart-items').addEventListener('click', (event) => {
        if (event.target.classList.contains('remove-from-cart')) {
            const id = event.target.getAttribute('data-id');
            const itemIndex = cart.findIndex(item => item.id == id);

            if (itemIndex !== -1) {
                cart.splice(itemIndex, 1);
            }

            updateCart();
        }
    });

    document.getElementById('checkout').addEventListener('click', () => {
        // Vaciar el carrito
        cart.length = 0;
        updateCart();

        // Mostrar mensaje de agradecimiento
        document.getElementById('thank-you-message').style.display = 'block';
    });

    renderCart();
});
