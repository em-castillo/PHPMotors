<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<?php if ($_SESSION['loggedin'] = TRUE && $_SESSION['clientData']['clientLevel'] > 1) {
    echo '<main>
  <h1>Add Car Classification</h1>
  <?php
  if (isset($message)) {
      echo $message;
  }
  ?>
  <!-- Since we want the registration data to be "written" to the database, we will use post. -->
  <form action="/phpmotors/vehicles/index.php" method="post">
      <fieldset>
          <legend>--------</legend>
          <label class="col">Classification Name:
              <span id="span">*Classification name must be no longer than 30 characters.</span>
              <input type="text" name="classificationName" maxlength="30" required /></label>

      </fieldset>
      <div id="down">
          <input type="submit" name="submit" value="Add" class="submitBtn" />
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="Classification">
      </div>
  </form>
</main>';
} else {
    header('Location:/phpmotors/index.php');
    exit;
} ?>


<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>