<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<?php if ($_SESSION['loggedin'] = TRUE && $_SESSION['clientData']['clientLevel'] < 2) {
  header('Location: /phpmotors/');
  exit;
}
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
} ?>
<main>
  <h1>Vehicle Management</h1>
  <ul id="vehicle_list">
    <li><a href="/phpmotors/vehicles/index.php?action=add-class">Add Classification</a></li>
    <li><a href="/phpmotors/vehicles/index.php?action=add-vehicle">Add Vehicle</a></li>
  </ul>

  <?php
  if (isset($message)) {
    echo $message;
  }
  if (isset($classificationList)) {
    echo '<h2>Vehicles By Classification</h2>';
    echo '<p>Choose a classification to see those vehicles</p>';
    echo $classificationList;
  }
  ?>
  <noscript>
    <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
  </noscript>
  <table id="inventoryDisplay"></table>
</main>

<script src="../js/inventory.js"></script>
<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
<?php unset($_SESSION['message']); ?>