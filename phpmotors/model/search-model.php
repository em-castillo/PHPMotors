<?php
// Search Model

//Function gets all vehicles according to search word
function getSearchedVehicle($searchString)
{
    $db = phpmotorsConnect();
    $sql = ' SELECT * FROM inventory WHERE invMake LIKE :searchString OR invModel LIKE :searchString OR invDescription LIKE :searchString OR invColor LIKE :searchString';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':searchString', '%' . $searchString . '%', PDO::PARAM_STR);
    $stmt->execute();
    $invSearch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invSearch;
}

// Function gets number of vehicles per page
function getRowsPerPage($searchString, $start_from, $limit)
{
    $db = phpmotorsConnect();
    $sql = "SELECT * FROM inventory WHERE invMake LIKE :searchString OR invModel LIKE :searchString OR invDescription LIKE :searchString OR invColor LIKE :searchString LIMIT " . $start_from . ',' . $limit;
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':searchString', '%' . $searchString . '%', PDO::PARAM_STR);
    $stmt->bindValue(':start_from', $start_from, PDO::PARAM_INT);
    $stmt->bindValue(':limit',  $limit, PDO::PARAM_INT);
    $stmt->execute();
    $currentPageSearch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $currentPageSearch;
}
