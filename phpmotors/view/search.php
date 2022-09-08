<!-- HEADER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<!-- NAVIGATION -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>

<!-- MAIN -->
<main>
    <h1>Search</h1>

    <form action="/phpmotors/search/index.php" method="get">
        <label class="col">
            What are you looking for?
            <input id="searching" type="text" name="searchString" <?php if (isset($searchString)) {
                                                                        echo "value='$searchString'";
                                                                    }  ?> required /></label>

        <div id="down">
            <input type="submit" name="submit" value="Search" class="submitBtn" />
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="searchItem">
        </div>
    </form>

    <?php if (isset($searchResults)) {
        echo $searchResults;
    } ?>
    <?php if (isset($searchList)) {
        echo $searchList;
    } ?>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <?php
    if (isset($num)) {
        echo $num;
    }
    ?>


</main>

<!-- FOOTER -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>