document.addEventListener("DOMContentLoaded", function () {
          // Get all products
          const products = document.querySelectorAll(".product");

          // Add event listener to each product for mouseover
          products.forEach((product) => {
            product.addEventListener("mouseover", function () {
              product.style.backgroundColor = "#f4f4f4";
              product.style.boxShadow = "0 0 5px rgba(0, 0, 0, 0.3)";
            });

            product.addEventListener("mouseout", function () {
              product.style.backgroundColor = "";
              product.style.boxShadow = "";
            });

            // Add event listener to add product to cart
            product.addEventListener("click", function () {
              // Increment the cart count
              const cartCount = document.querySelector(".cart span");
              cartCount.textContent = parseInt(cartCount.textContent) + 1;
            });
          });
        });