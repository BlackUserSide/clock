<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/libs/themes/dark.css">
    <link rel="stylesheet" href="/libs/jquery.arcticmodal-0.3.css">
    <title><?php echo $pageData['title'] ?></title>
</head>

<body>
    <main class="order-main">
        <div class="content-form-order">
            <div class="top-line-form-order">
                <img src="/img/visa.png" alt="">
                <img src="/img/Master Card.png" alt="">
                <img src="/img/PayPal.png" alt="">
            </div>
            <div class="line-form-order">
                <h1 class="h1">or</h1>
            </div>
            <form class="form-order-wrapper">
                <div class="top-line-in-form">
                    <h1 class="h1">Contact information</h1>
                </div>
                <input type="hidden" name="idProduct" id="idProduct">
                <input type="hidden" name="col" id="colProduct">
                <input type="hidden" name="price" id="priceForm">
                <input type="hidden" name="discount" id="discountProduct">
                <input type="text" name="e-mail" placeholder="Email" required>
                <input type="text" name="fullName" placeholder="Full name" required><br>
                <select name="country" id="countrySelect">

                </select>
                <input type="text" class="postal-small" name="postal" placeholder="Postal code" required>
                <input type="text" name="address" placeholder="Address" required>
                <input type="text" name="apartment" placeholder="Apartment, suite, ect. (optional)" required>
                <input type="text" name="city" placeholder="City" required>
                <input type="text" name="phone" placeholder="Phone(optional)"><br>
                <div class="button-wrapper-order">
                    <button>Confirm</button>
                </div>
                
            </form>
        </div>
        <div class="content-product-order">
            <div class="item-order-wrapper">
                <div class="image-compos-order"></div>
                <div class="text-order-item">
                    <h1 class="h1-order-item"></h1>
                    <p class="qnt-item"></p>
                    <div class="price-discount-item-order">

                    </div>
                </div>
            </div>
            <div class="price-wrapper-order">
                <div class="price-composition">
                    
                    <div class="subtotal-remove-order">
                        <p>Subtotal: </p>
                    </div>
                    <div class="sale-remove-order">
                        <p>Sale: </p>
                    </div>
                    <div class="total-remove-order">
                        <p>Total: </p>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: none">
            <div class="message-ok box-modal">
                <p><span>Thanks</span> for your order</p>
            </div>
        </div>
    </main>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/libs/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/order.js"></script>
</body>

</html>