document.addEventListener('DOMContentLoaded', () => {
    const addCartButtons = document.querySelectorAll('.addCart');
    const cartIcon = document.querySelector('.icon-cart span');
    const cartTab = document.querySelector('.cartTab');
    const closeCartButton = document.querySelector('.close');
    const checkoutButton = document.querySelector('.checkOut');
    const cartList = document.querySelector('.listCart');
    const totalPriceElement = document.querySelector('.cartTab .totalPrice span');
    const body = document.querySelector('body');

    addCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const item = button.closest('.item');
            const productName = item.querySelector('h2').innerText;
            const productPrice = parseFloat(item.querySelector('.price').innerText.replace('RS.', ''));
            const productImage = item.querySelector('img').src;

            const formData = new FormData();
            formData.append('product_name', productName);
            formData.append('product_price', productPrice);
            formData.append('product_image', productImage);
            formData.append('action', 'add_to_cart');

            fetch('cart.php', {
                    method: 'POST',
                    body: formData,
                    credentials: 'include' // Include session ID in request
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    updateCart();
                });
        });
    });

    function updateCart() {
        const formData = new FormData();
        formData.append('action', 'fetch_cart');

        fetch('cart.php', {
                method: 'POST',
                body: formData,
                credentials: 'include' // Include session ID in request
            })
            .then(response => response.json())
            .then(data => {
                cartList.innerHTML = '';
                let totalAmount = 0;
                data.forEach(item => {
                    const cartItem = document.createElement('div');
                    cartItem.classList.add('item');
                    cartItem.innerHTML = `
                    <div class="image">
                        <img src="${item.product_image}" alt="${item.product_name}">
                    </div>
                    <div class="name">${item.product_name}</div>
                    <div class="Price">RS.${item.product_price * item.quantity}</div>
                    <div class="quantity">
                        <span class="minus"> - </span>
                        <span>${item.quantity}</span>
                        <span class="plus"> + </span>
                    </div>
                `;

                    cartItem.querySelector('.minus').addEventListener('click', () => {
                        updateCartItemQuantity(item.product_name, item.quantity - 1);
                    });

                    cartItem.querySelector('.plus').addEventListener('click', () => {
                        updateCartItemQuantity(item.product_name, item.quantity + 1);
                    });

                    cartList.appendChild(cartItem);
                    totalAmount += item.product_price * item.quantity;
                });
                totalPriceElement.innerText = `RS.${totalAmount}`;
            });
    }

    function updateCartItemQuantity(productName, quantity) {
        const formData = new FormData();
        formData.append('product_name', productName);
        formData.append('quantity', quantity);
        formData.append('action', 'update_cart');

        fetch('cart.php', {
                method: 'POST',
                body: formData,
                credentials: 'username'
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                updateCart();
            });
    }

    const iconCart = document.querySelector('.icon-cart');
    iconCart.addEventListener('click', () => {
        body.classList.toggle('showCart');
    });

    const closeCart = document.querySelector('.close');
    closeCart.addEventListener('click', () => {
        body.classList.toggle('showCart');
    });

    checkoutButton.addEventListener('click', () => {
        fetch('cart.php', {
                method: 'POST',
                body: new FormData().append('action', 'fetch_cart'),
                credentials: 'username'
            })
            .then(response => response.json())
            .then(cart => {
                if (cart.length > 0) {
                    const totalAmount = cart.reduce((total, item) => total + item.product_price * item.quantity, 0);
                    if (confirm(`Your total is RS.${totalAmount}. Proceed to checkout?`)) {
                        const formData = new FormData();
                        formData.append('action', 'checkout');
                        fetch('cart.php', {
                                method: 'POST',
                                body: formData,
                                credentials: 'username'
                            })
                            .then(response => response.text())
                            .then(data => {
                                alert('Checkout successful!');
                                updateCart();
                                body.classList.remove('showCart');
                            });
                    }
                } else {
                    alert('Your cart is empty');
                }
            });
    });

    updateCart();
});