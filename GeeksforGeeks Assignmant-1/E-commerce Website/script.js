
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        document.querySelectorAll('.add-to-cart-btn').forEach((btn) => {
            btn.addEventListener('click', () => {
                const productCard = btn.closest('.product-item');
                const productId = productCard.id;
                const productName = productCard.querySelector('h3').innerText;
                const productPrice = productCard.querySelector('.price').innerText;
                const productImage = productCard.querySelector('img').src;

                const product = {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    image: productImage
                };

                const exists = cart.find(item => item.id === product.id);
                if (!exists) {
                    cart.push(product);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    alert(`${product.name} added to cart!`);
                    updateCartCount();
                } else {
                    alert(`${product.name} is already in your cart.`);
                }
            });
        });

        function updateCartCount() {
            const cartCount = cart.length;
            let cartLink = document.querySelector('#cartLink');
            if (cartLink) {
                cartLink.innerText = `My Cart (${cartCount})`;
            }
        }

        updateCartCount();
