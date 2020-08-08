<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/libs/slick/slick/slick.css">
    <link rel="stylesheet" href="/libs/slick/slick/slick-theme.css">
    <link rel="stylesheet" href="/libs/humberger/hamburgers.min.css">
    <link rel="stylesheet" href="/libs/themes/dark.css">
    <link rel="stylesheet" href="/libs/jquery.arcticmodal-0.3.css">
    <title><?php echo $pageData['title'] ?></title>
</head>

<body>
    <header class="main-header" id="header-catalog">
        <?php include ROOT . '/views/native/header.tpl.php' ?>
    </header>
    <section class="main-catalog-wrapper">
        <div class="product-wrapper">
            <?php foreach ($pageData['dataProduct'] as $key => $val) { ?>
                <div class="item-wrapper-product">
                    <div class="image-product">
                        <img src="/img/product/<?php echo $val['image'] ?>" img-src="<?php echo $val['image'] ?>" alt="">
                        <p>Click to to enlarge</p>
                    </div>
                    <div class="text-item-wrapper">
                        <div class="name-wrapper">
                            <h1 class="h1"><?php echo $val['name'] ?></h1>
                        </div>
                        <div class="description-wrapper-item">
                            <p><?php echo $val['description'] ?></p>
                        </div>
                        <div class="last-line-product">
                            <?php if ($val['discount'] == '0') : ?>
                                <p class="price-full"><?php echo $val['price'] ?></p>
                                <a href="#" class="buy-link" id="<?php echo $val['id'] ?>">Buy</a>
                            <?php else : ?>
                                <p class="discount-price-full"><?php echo $val['price'] ?></p>
                                <p class="discount-price-item"><?php
                                                                $discount = $val['discount'];
                                                                $price = $val['price'];
                                                                $res = $price * $discount / 100;
                                                                $result = $price - $res;
                                                                echo $result;
                                                                ?></p>
                                <a href="#" class="buy-link" id="<?php echo $val['id'] ?>">Buy</a>
                            <?php endif ?>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </section>
    <div style="display: none;">
        <div class="hidden-form-buy box-modal">
            <div class="product-composition">
                <div class="image-wrapper-buy">

                </div>
                <div class="text-wrapper-buy">
                    <h3 class="name-form-buy"></h3>

                </div>

            </div>
            <div class="label-wrapper-buy">
                <label>Change amount: </label>
                <input type="text" onkeyup="this.value = this.value.replace(/[^\d]/g,'');" id="col-product" name="amount" value="1" required>
            </div>
            <button type="submit">Confirm</button>
            <a href="#" class="remove-buy-form">Clear</a>
            <div class="box-modal_close" style="font-size: 22px;">x</div>
        </div>
    </div>
    <div style="display: none">
        <div class="hidden-art box-modal">

        </div>
    </div>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/libs/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/catalog.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>