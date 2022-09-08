<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<main>
    <h1>Registration</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <!-- Since we want the registration data to be "written" to the database, we will use post. -->
    <!-- The php part is used for stickiness -->
    <form action="/phpmotors/accounts/index.php" method="post">
        <fieldset>
            <legend>Enter information here</legend>
            <label class="col">
                First Name: <input type="text" name="clientFirstname" <?php if (isset($clientFirstname)) {
                                                                            echo "value='$clientFirstname'";
                                                                        }  ?> required /></label>
            <label class="col">
                Last Name: <input type="text" name="clientLastname" <?php if (isset($clientLastname)) {
                                                                        echo "value='$clientLastname'";
                                                                    }  ?> required /></label>
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
        <div id=" down">
            <input type="submit" name="submit" value="Register" class="submitBtn" />
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="register">
        </div>
    </form>
</main>

<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>