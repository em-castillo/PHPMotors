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
$classificationList = '<select name="classificationId" id="classificationId">';
$classificationList .= "<option>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $classificationList .= ' selected ';
        }
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] === $invInfo['classificationId']) {
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
    <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
            echo "Modify $invInfo[invMake] $invInfo[invModel]";
        } elseif (isset($invMake) && isset($invModel)) {
            echo "Modify $invMake $invModel";
        } ?></h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <!-- Since we want the registration data to be "written" to the database, we will use post. -->
    <form action="/phpmotors/vehicles/index.php" method="post">
        <fieldset>
            <legend>Update information here</legend>

            <?php
            echo $classificationList; ?>


            <label class="col">
                Make: <input type="text" name="invMake" <?php if (isset($invMake)) {
                                                            echo "value='$invMake'";
                                                        } elseif (isset($invInfo['invMake'])) {
                                                            echo "value='$invInfo[invMake]'";
                                                        } ?> required /></label>
            <label class="col">
                Model: <input type="text" name="invModel" <?php if (isset($invModel)) {
                                                                echo "value='$invModel'";
                                                            } elseif (isset($invInfo['invModel'])) {
                                                                echo "value='$invInfo[invModel]'";
                                                            } ?> required /></label>
            <label class="col">
                Description:
                <input type="text" name="invDescription" <?php if (isset($invDescription)) {
                                                                echo "value='$invDescription'";
                                                            } elseif (isset($invInfo['invDescription'])) {
                                                                echo "value='$invInfo[invDescription]'";
                                                            } ?> required></label>
            <label class="col">
                Image Path:
                <input type="text" name="invImage" value="/phpmotors/images/no-image.png" <?php if (isset($invImage)) {
                                                                                                echo "value='$invImage'";
                                                                                            } elseif (isset($invInfo['invImage'])) {
                                                                                                echo "value='$invInfo[invImage]'";
                                                                                            } ?> required /></label>
            <label class="col">
                Thumbnail Path:
                <input type="text" name="invThumbnail" value="/phpmotors/images/no-image-tn.png" <?php if (isset($invThumbnail)) {
                                                                                                        echo "value='$invThumbnail'";
                                                                                                    } elseif (isset($invInfo['invThumbnail'])) {
                                                                                                        echo "value='$invInfo[invThumbnail]'";
                                                                                                    } ?> required /></label>
            <label class="col">
                Price: <input type="number" name="invPrice" <?php if (isset($invPrice)) {
                                                                echo "value='$invPrice'";
                                                            } elseif (isset($invInfo['invPrice'])) {
                                                                echo "value='$invInfo[invPrice]'";
                                                            } ?> required /></label>
            <label class="col">
                # In Stock:
                <input type="number" name="invStock" <?php if (isset($invStock)) {
                                                            echo "value='$invStock'";
                                                        } elseif (isset($invInfo['invStock'])) {
                                                            echo "value='$invInfo[invStock]'";
                                                        } ?> required /></label>
            <label class="col">
                Color:
                <input type="text" name="invColor" <?php if (isset($invColor)) {
                                                        echo "value='$invColor'";
                                                    } elseif (isset($invInfo['invColor'])) {
                                                        echo "value='$invInfo[invColor]'";
                                                    } ?> required /></label>



        </fieldset>
        <div id="down">
            <input type="submit" name="submit" value="Update" class="submitBtn" />
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                            echo $invInfo['invId'];
                                                        } elseif (isset($invId)) {
                                                            echo $invId;
                                                        } ?>">
        </div>
    </form>
</main>




<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>