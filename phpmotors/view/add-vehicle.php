<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<?php
if ($_SESSION['loggedin'] = TRUE && $_SESSION['clientData']['clientLevel'] < 2) {
    header('Location: /phpmotors/');
    exit;
}
?>

<!-- Car classification drop down menu -->
<?php
$classificationList = '<select name="classificationId" required>';
$classificationList .= "<option selected disabled>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
    $classificationList .= "<option value = \"$classification[classificationId]\"";
    if (isset($classificationId)) {
        // == compares integers. === compares strings.
        if ($classification['classificationId'] == $classificationId) {
            $classificationList .= ' selected ';
        }
    }

    $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?>
<!DOCTYPE html>

<!-- MAIN -->
<main>
    <h1>Add Vehicle</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <!-- Since we want the registration data to be "written" to the database, we will use post. -->
    <form action="/phpmotors/vehicles/index.php" method="post">
        <fieldset>
            <legend>Enter information here</legend>

            <?php
            echo $classificationList; ?>


            <label class="col">
                Make: <input type="text" name="invMake" <?php if (isset($invMake)) {
                                                            echo "value='$invMake'";
                                                        }  ?> required /></label>
            <label class="col">
                Model: <input type="text" name="invModel" <?php if (isset($invModel)) {
                                                                echo "value='$invModel'";
                                                            }  ?> required /></label>
            <label class="col">
                Description:
                <input type="text" name="invDescription" <?php if (isset($invDescription)) {
                                                                echo "value='$invDescription'";
                                                            }  ?> required></label>
            <label class="col">
                Image Path:
                <input type="text" name="invImage" value="/phpmotors/images/no-image.png" <?php if (isset($invImage)) {
                                                                                                echo "value='$invImage'";
                                                                                            }  ?> required /></label>
            <label class="col">
                Thumbnail Path:
                <input type="text" name="invThumbnail" value="/phpmotors/images/no-image-tn.png" <?php if (isset($invThumbnail)) {
                                                                                                        echo "value='$invThumbnail'";
                                                                                                    }  ?> required /></label>
            <label class="col">
                Price: <input type="number" name="invPrice" <?php if (isset($invPrice)) {
                                                                echo "value='$invPrice'";
                                                            }  ?> required /></label>
            <label class="col">
                # In Stock:
                <input type="number" name="invStock" <?php if (isset($invStock)) {
                                                            echo "value='$invStock'";
                                                        }  ?> required /></label>
            <label class="col">
                Color:
                <input type="text" name="invColor" <?php if (isset($invColor)) {
                                                        echo "value='$invColor'";
                                                    }  ?> required /></label>



        </fieldset>
        <div id="down">
            <input type="submit" name="submit" value="Add" class="submitBtn" />
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="Vehicle">
        </div>
    </form>
</main>




<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>