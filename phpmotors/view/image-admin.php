<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?>
<main>
    <h1>Image Management</h1>
    <p>Choose one of the options bellow:</p>

    <h2>Add New Vehicle Image</h2>
    <?php
    if (isset($message)) {
        echo $message;
    } ?>

    <!-- enctype -> required when uploading files -->
    <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
        <label for="invItem">Vehicle</label>
        <!-- select list -->
        <?php echo $prodSelect; ?>
        <fieldset>
            <label>Is this the main image for the vehicle?</label>
            <label for="priYes" class="pImage">Yes</label>
            <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
            <label for="priNo" class="pImage">No</label>
            <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
        </fieldset>
        <label>Upload Image:</label>
        <input type="file" name="file1">
        <input type="submit" class="regbtn" value="Upload">
        <input type="hidden" name="action" value="upload">
    </form>
    <!-- visual separator -->
    <hr>
    <h2>Existing Images</h2>
    <p id='text'>If deleting an image, delete the thumbnail too and vice versa.</p>
    <?php
    if (isset($imageDisplay)) {
        echo $imageDisplay;
    } ?>
</main>

<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
<?php unset($_SESSION['message']); ?>