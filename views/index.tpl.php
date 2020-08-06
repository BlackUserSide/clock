<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/libs/slick/slick/slick.css">
    <link rel="stylesheet" href="/libs/slick/slick/slick-theme.css">
    <title><?php echo $pageData['title'] ?></title>
</head>

<body>
    <header class="main-header">
        <?php include ROOT . '/views/native/header.tpl.php' ?>
        <div class="text-composition">
            <h1 class="h1"><span>Lamp Clock</span><br>
                Safe Made</h1>
            <p>This is a designer piece of furniture and A gift that you will definitely like</p>
            <a href="/catalog">Catalog</a>
        </div>
        <div class="scroll-wrapper">
            <img src="/img/Scroll.png" alt="">
        </div>
    </header>
    <section class="s-main">
        <div class="top-line section-top">
            <h1 class="h1">Time stands still with us</h1>
        </div>
        <div class="composition-main-content">
            <div class="first-text-main">
                <p>To your house or apartment</p>
                <p>For a loved one and friend</p>
                <p>For birthday and new year</p>
            </div>
            <div class="image-wrapper-main">
                <img src="/img/image-1.png" alt="">
            </div>
            <div class="second-text-main">
                <p>To your house or apartment</p>
                <p>To the study and meeting room</p>
                <p>Corporate VIP gifts</p>
            </div>
        </div>
    </section>
    <section class="s-clock">
        <?php foreach ($pageData['dataClock'] as $key => $val) { ?>
            <div class="name-wrapper-clock">
                <p><?php echo $val['name'] ?></p>
            </div>
            <div class="image-text-wrapper-clock">
                <?php if ($val['discount'] == '0') : ?>
                    <p class="discount-value">$<?php echo $val['price'] ?></p>
                    <img src="/img/product/1.png" alt="">
                <?php else : ?>
                    <p class="price-discount-clock">$<?php echo $val['price'] ?></p>
                    <p class="discount-value">$<?php
                                                $discount = $val['discount'];
                                                $price = $val['price'];
                                                $res = $price * $discount / 100;
                                                $result = $price - $res;
                                                echo $result;
                                                ?>
                    </p>
                    <img src="/img/product/1.png" alt="">
                <?php endif ?>
            </div>
        <?php } ?>
    </section>
    <section class="s-review">
        <div class="slider-wrapper">
            <h1 class="h1">Reviews</h1>
            <div class="review-wrapper">
                <?php foreach ($pageData['reviewData'] as $key => $val) { ?>
                    <div class="review-item">
                        <p class="text-review"><?php echo $val['text'] ?></p>
                        <p class="name-user-review"><?php echo $val['name'] ?></p>
                        <p class="position-review"><?php echo $val['position'] ?></p>
                    </div>

                <?php } ?>
            </div><br>
            <a href="#" class="link-add-review">WRITE A REVIEW</a>
        </div>
    </section>
    <footer class="site-footer">
        <div class="content-footer">
            <div class="logo-footer">
                <img src="/img/footer-logo.png" alt="">
            </div>
            <nav class="nav-footer">
                <ul>
                    <li><a href="/">Main</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Catalog</a></li>
                </ul>
            </nav>
        </div>

    </footer>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/libs/slick/slick/slick.min.js"></script>
    <script src="/js/index.js"></script>
</body>

</html>