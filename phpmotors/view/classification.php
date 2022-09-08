<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<main>

    <h1><?php echo $classificationName; ?> Vehicles</h1>
    <?php if (isset($message)) {
        echo $message;
    }
    ?>
    <?php if (isset($vehicleDisplay)) {
        echo $vehicleDisplay;
    } ?>
</main>

<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>