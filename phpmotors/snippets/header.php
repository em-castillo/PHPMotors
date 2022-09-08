<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Building a template" />
    <meta name="author" content="Emily Castillo" />
    <!-- <title>PHP Motors</title> -->
    <title><?php
            if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "$change $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "$change $invMake $invModel";
            } elseif (isset($detailedInfo['invMake']) && isset($detailedInfo['invModel'])) {
                echo "$detailedInfo[invMake] $detailedInfo[invModel]";
            } elseif (isset($title)) {
                echo $title;
            } ?> | PHP Motors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="/phpmotors/css/template.css" type="text/css" rel="stylesheet" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet" />
</head>

<body>
    <img src="/phpmotors/images/site/phpmotors-bg.jpg" alt="php motors background" />
    <!-- HEADER -->
    <div id="wrapper">
        <header>
            <img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo" />


            <?php if (!isset($_SESSION['loggedin'])) {
                echo '<a href="/phpmotors/accounts/index.php?action=login" title="PHP Motors Login">My account</a><a id="search" href="/phpmotors/search/index.php?action=searchPage" title="PHP Motors Search"><img src="/phpmotors/images/site/search.png" alt="Search icon" /></a>';
            } else {
                echo "<span><a id='welcome' href='/phpmotors/accounts/index.php'>", $_SESSION['clientData']['clientFirstname'],
                "</a></span>";
                echo '<a href="/phpmotors/accounts/index.php?action=Logout" title="PHP Motors Log out">Log out</a><a id="search" href="/phpmotors/search/index.php?action=searchPage"><img src="/phpmotors/images/site/search.png" alt="Search icon" /></a>';
            } ?>

        </header>