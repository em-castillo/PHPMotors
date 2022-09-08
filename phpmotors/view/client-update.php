<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<!-- If visitor is not logged in, send them to main controller -->
<?php if (!isset($_SESSION['loggedin'])) {
    header('Location:/phpmotors/index.php');
    exit;
} ?><main>
    <h1>Manage Account</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <h2>Update Account</h2>
    <form action="/phpmotors/accounts/index.php" method="post">
        <fieldset>
            <legend>--------</legend>
            <!-- php used $_SESSION to keep user's info from the session and make it sticky -->
            <label class="col">
                First Name: <input type="text" name="clientFirstname" <?php if (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                            echo "value='{$_SESSION['clientData']['clientFirstname']}'";
                                                                        } ?> required /></label>
            <label class="col">
                Last Name: <input type="text" name="clientLastname" <?php if (isset($_SESSION['clientData']['clientLastname'])) {
                                                                        echo "value='{$_SESSION['clientData']['clientLastname']}'";
                                                                    } ?> required /></label>
            <label class="col">
                Email:
                <input type="email" name="clientEmail" placeholder="info@example.com" <?php if (isset($_SESSION['clientData']['clientEmail'])) {
                                                                                            echo "value='{$_SESSION['clientData']['clientEmail']}'";
                                                                                        } ?> required /></label>
        </fieldset>
        <div id="down">
            <input type="submit" name="submit" value="Update" class="submitBtn" />
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="updateClient">
            <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                            echo $_SESSION['clientData']['clientId'];
                                                        } ?>">
        </div>
    </form>

    <h2>Update Password</h2>
    <?php
    if (isset($message1)) {
        echo $message1;
    }
    ?>
    <p>Original password will be changed.</p>
    <form action="/phpmotors/accounts/index.php" method="post">
        <fieldset>
            <legend>--------</legend>
            <label class="col">
                Password:
                <span id="span">*Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <input type="password" name="clientPassword" placeholder="********" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" /></label>
        </fieldset>
        <div id="down2">
            <input type="submit" name="submit" value="Update" class="submitBtn" />
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="updatePassword">
            <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                            echo $_SESSION['clientData']['clientId'];
                                                        } ?>">
        </div>
    </form>
</main>

<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>