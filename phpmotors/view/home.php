<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>


<!-- MAIN -->
<main>
    <h1>Welcome to PHP Motors!</h1>
    <div class="description">
        <h2>DMC Delorean</h2>
        <ul>
            <li>3 cup holders</li>
            <li>Superman doors</li>
            <li>Fuzzy dice!</li>
        </ul>
    </div>
    <img src="/phpmotors/images/vehicles/delorean.jpg" alt="car" />
    <a href="#"><img id="button" src="/phpmotors/images/site/own_today.png" alt="own today button" /></a>
    <div class="grid">
        <div class="reviews">
            <h2>DMC Delorean Reviews</h2>
            <ul>
                <li>&bull; "So fats its almost like traveling in time." [4/5]</li>
                <li>&bull; "Coolest ride on the road." [4/5]</li>
                <li>&bull; "I'm feeling Marty McFly!." [5/5]</li>
                <li>&bull; "The most futuristic ride of our day." [4.5/5]</li>
                <li>&bull; "80'S livin and I love it." [5/5]</li>
            </ul>
        </div>
        <div class="upgrades">
            <h2>Delorean Upgrades</h2>
            <div id="top">
                <img src="/phpmotors/images/upgrades/flux-cap.png" alt="flux cap" />
                <img src="/phpmotors/images/upgrades/flame.jpg" alt="flame" />

                <a href="#">Flux Capacitor</a>
                <a href="#">Flame Decals</a>
            </div>

            <div id="bottom">
                <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="bumper sticker" />
                <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="hub cap" />

                <a href="#">Bumper Stickers</a>
                <a href="#">Hub Caps</a>
            </div>
        </div>

    </div>
</main>

<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>

<!-- http://localhost/phpmotors/index.php -->