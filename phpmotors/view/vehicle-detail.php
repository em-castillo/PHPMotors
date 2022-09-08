<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<main>
    <!-- Display car make and model -->
    <h1 id='vehicle-detail'><?php echo $detailedInfo['invMake'] . " " . $detailedInfo['invModel']; ?></h1>
    <?php if (isset($message)) {
        echo $message;
    }
    ?>
    <div id="detail-grid">
        <!-- Display extra car images -->
        <?php if (isset($createTn)) {
            echo $createTn;
        } ?>
        <!-- Display car detailed info -->
        <?php if (isset($vehicleDetails)) {
            echo $vehicleDetails;
        } ?>
    </div>
</main>

<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>