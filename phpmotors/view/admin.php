<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<!-- If visitor is not logged in, send them to main controller -->
<?php if (!isset($_SESSION['loggedin'])) {
    header('Location:/phpmotors/index.php');
    exit;
}
?><main>
    <h1><?php echo $_SESSION['clientData']['clientFirstname'];
        echo " ";
        echo $_SESSION['clientData']['clientLastname'];
        ?></h1>
    <p>You are logged in.</p>
    <p id="text"><?php if (isset($_SESSION['message'])) {
                        $message = $_SESSION['message'];
                    }
                    if (isset($message)) {
                        echo $message;
                    } ?></p>
    <ul id="admin">
        <li>First name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
        <li>Last name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
        <li>Email address: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
    </ul>

    <h2>Account Management</h2>
    <p>Use this link to update account information.</p>
    <p><a href="/phpmotors/accounts/index.php?action=update">Update Account Information</a></p>


    <?php if ($_SESSION['clientData']['clientLevel'] > 1) {
        echo '<h2>Inventory Management</h2>
        <p>Use this link to manage the inventory.</p>';
        echo '<p><a href="/phpmotors/vehicles/index.php">Vehicle Management</a></p>';
    } ?>
</main>

<script src="../js/client.js"></script>
<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
<!-- unset every time $_SESSION is used on view page-->
<?php unset($_SESSION['message']); ?>