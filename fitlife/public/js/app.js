document.addEventListener("DOMContentLoaded", () => {
    const cartCountElem = document.getElementById("cart-count");

    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        if (cartCountElem) cartCountElem.textContent = totalItems;
    }

    updateCartCount();
    document.addEventListener("cartUpdated", updateCartCount);

    // Render Cart Page
    if (document.getElementById("cart-items")) renderCart();
    if (document.getElementById("checkout-items")) renderCheckout();
});

function addToCart(name, price) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    const existing = cart.find(item => item.name === name);
    if (existing) existing.quantity++;
    else cart.push({ name, price, quantity: 1 });

    localStorage.setItem("cart", JSON.stringify(cart));
    alert(`${name} added to cart!`);
    document.dispatchEvent(new Event("cartUpdated"));
}

function renderCart() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const cartContainer = document.getElementById("cart-items");
    const totalElem = document.getElementById("cart-total");
    let total = 0;

    if (cart.length === 0) {
        cartContainer.innerHTML = "<p>Your cart is empty.</p>";
        totalElem.textContent = "0.00";
        return;
    }

    cartContainer.innerHTML = "";
    cart.forEach((item, index) => {
        total += item.price * item.quantity;
        cartContainer.innerHTML += `
            <div class="cart-item">
                <h4>${item.name}</h4>
                <p>Price: $${item.price}</p>
                <p>Qty: <input type="number" min="1" value="${item.quantity}" data-index="${index}" class="qty-input"></p>
                <button class="remove-btn" data-index="${index}">Remove</button>
            </div>`;
    });

    totalElem.textContent = total.toFixed(2);

    document.querySelectorAll(".remove-btn").forEach(btn => {
        btn.addEventListener("click", e => {
            const i = e.target.dataset.index;
            cart.splice(i, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            document.dispatchEvent(new Event("cartUpdated"));
            renderCart();
        });
    });

    document.querySelectorAll(".qty-input").forEach(input => {
        input.addEventListener("change", e => {
            const i = e.target.dataset.index;
            cart[i].quantity = parseInt(e.target.value);
            localStorage.setItem("cart", JSON.stringify(cart));
            document.dispatchEvent(new Event("cartUpdated"));
            renderCart();
        });
    });
}

function renderCheckout() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const checkoutItems = document.getElementById("checkout-items");
    const totalElem = document.getElementById("checkout-total");
    let total = 0;

    checkoutItems.innerHTML = "";
    if (cart.length === 0) {
        checkoutItems.innerHTML = "<li>Your cart is empty.</li>";
        return;
    }

    cart.forEach(item => {
        total += item.price * item.quantity;
        checkoutItems.innerHTML += `<li>${item.name} x${item.quantity} - $${(item.price * item.quantity).toFixed(2)}</li>`;
    });

    totalElem.textContent = total.toFixed(2);

    document.getElementById("checkout-form").addEventListener("submit", e => {
        e.preventDefault();
        alert("✅ Order placed successfully!");
        localStorage.removeItem("cart");
        document.dispatchEvent(new Event("cartUpdated"));
        window.location.href = "/";
    });
}
