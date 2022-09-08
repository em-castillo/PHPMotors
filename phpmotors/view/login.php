<!-- HEADER -->

<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>


<!-- MAIN -->
<main>
    <h1>Your Account</h1>
    <?php
    if (isset($message)) {
        echo $message;
    } else if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
    }
    ?>
    <form action="/phpmotors/accounts/index.php" method="post">
        <fieldset>
            <legend>Enter information here</legend>
            <label class="col">
                Email:
                <input type="email" name="clientEmail" placeholder="info@example.com" <?php if (isset($clientEmail)) {
                                                                                            echo "value='$clientEmail'";
                                                                                        }  ?> required /></label>
            <label class="col">
                Password:
                <span id="span">*Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <input type="password" name="clientPassword" placeholder="********" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" /></label>

        </fieldset>
        <div id="down">
            <input type="submit" value="Sign In" class="submitBtn" />
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="Login">
            <a class="member" href="/phpmotors/accounts/index.php?action=registration" title="PHP Motors Registration">Register here</a>
        </div>
    </form>
</main>

<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
<?php unset($_SESSION['message']); ?>