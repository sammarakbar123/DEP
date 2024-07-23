$(document).ready(function() {
    $.ajax({
        url: 'get_products.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Populate the product section with data
            data.forEach(product => {
                $('.product-row').append(`
                    <div class="swiper-slide box">
                        <div class="img">
                            <img src="${product.image}" alt="">
                        </div>
                        <div class="product-content">
                            <h3>${product.name}</h3>
                            <p>${product.description}</p>
                            <div class="orderNow">
                                <button>Order Now</button>
                            </div>
                        </div>
                    </div>
                `);
            });
        }
    });
});