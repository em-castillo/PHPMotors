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
    <h1><?php if (isset($invInfo['invMake'])) {
            echo "Delete $invInfo[invMake] $invInfo[invModel]";
        } ?></h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <!-- Since we want the registration data to be "written" to the database, we will use post. -->
    <form action="/phpmotors/vehicles/index.php" method="post">
        <fieldset>
            <legend>Confirm Vehicle Deletion.</legend>

            <?php
            echo $classificationList; ?>


            <label class="col">
                Make: <input type="text" readonly name="invMake" <?php if (isset($invInfo['invMake'])) {
                                                                        echo "value='$invInfo[invMake]'";
                                                                    } ?> required /></label>
            <label class="col">
                Model: <input type="text" readonly name="invModel" <?php if (isset($invInfo['invModel'])) {
                                                                        echo "value='$invInfo[invModel]'";
                                                                    } ?> required /></label>
            <label class="col">
                Description:
                <input type="text" readonly name="invDescription" <?php if (isset($invInfo['invDescription'])) {
                                                                        echo "value='$invInfo[invDescription]'";
                                                                    } ?> required></label>


        </fieldset>
        <div id="down">
            <input type="submit" name="submit" value="Delete" class="submitBtn" />
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                            echo $invInfo['invId'];
                                                        } ?>">
        </div>
    </form>
</main>




<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>