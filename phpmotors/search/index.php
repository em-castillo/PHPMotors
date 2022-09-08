<?php
ini_set('display_errors', '1');
// Search vehicles controller

// access to session
session_start();

// outside resources 
require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/vehicles-model.php';
require_once '../model/uploads-model.php';
require_once '../library/functions.php';
require_once '../model/search-model.php';

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = navBar($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}


// Control structure for the controller
switch ($action) {
        //Searching a vehicle
    case 'searchPage':
        //page title
        $title = 'Search';
        include '../view/search.php';
        exit;
        break;

        // following case comes from form button or page link
    case 'searchItem':
        // Filter and store the data
        $searchString = trim(filter_input(INPUT_GET, 'searchString', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        // Remove html tags
        $searchString = strip_tags(html_entity_decode($searchString));


        // Check for missing data
        if (empty($searchString)) {
            $message = '<p id="text">Please type a search string.</p>';
            include '../view/search.php';
            exit;
        }

        //Current active page number - if 'page' exist in URL
        if (!isset($_GET['page'])) {
            $current_page = 1;
        } else {
            // get current number page of URL
            // www.coolcats.com/?page=4
            $current_page = $_GET['page'];
        }

        $limit = 10;
        // start from to search the database / from result num 10
        $start_from = ($current_page - 1) * $limit;

        // Send the data to the model
        // first query gets TOTAL vehicles list matching the search string
        $invSearch = getSearchedVehicle($searchString);
        // second query gets vehicles from $start_from 0-9, 10-19, etc.
        $currentPageSearch = getRowsPerPage($searchString, $start_from, $limit);

        // Check and report the result
        if (!count($invSearch)) {
            $searchResults = buildResultsString($searchString, $invSearch);
            $message = "<p id='text'>Sorry, no results were found to match $searchString.</p>";
        } else {
            $searchResults = buildResultsString($searchString, $invSearch);
            $searchList = buildSearchList($currentPageSearch);
        }


        // get the searchString from url
        // www.coolcats.com/?searchString=ford
        if (!isset($_GET['searchString'])) {
            $urlSearchString = "";
        } else {
            $urlSearchString = $_GET['searchString'];
        }

        // limits the list in the number of pagesgetRowsPerPage($start_from, $limit)
        $totalPages = ceil(count($invSearch) / $limit);

        $previous = $current_page - 1;
        $next = $current_page + 1;


        // 1 page result
        if ($totalPages <= 1) {
            $num = "";
        }
        // 1+ page result
        else {
            // Div with page numbers
            $num = '<div id="pagination">';

            // if current page is > 1, show the previous link
            if ($current_page > 1) {
                $num .= "<a></a>";
                $num .=  '<a title="Previous page" href = "/phpmotors/search/index.php?action=searchItem&page=' . $previous . '&searchString=' . $urlSearchString . '">' . 'Previous' . ' </a>';
            }

            // Create page numbers link
            for ($page_number = 1; $page_number <= $totalPages; $page_number++) {
                $num .= '<a title="Page ' . $page_number . '" href = "/phpmotors/search/index.php?action=searchItem&page=' . $page_number . '&searchString=' . $urlSearchString . '">' . $page_number . ' </a>';

                if ($page_number != $current_page) {
                    $num .= "";
                } else {
                    $num .= '<a style="pointer-events: none;" href = "/phpmotors/search/index.php?action=searchItem&page=' . $page_number . '">' . $page_number . ' </a>';
                }
            };


            // if current page is < total pages, show the next link
            if ($current_page < $totalPages) {
                $num .= "<a></a>";
                $num .=  '<a title="Next page" href = "/phpmotors/search/index.php?action=searchItem&page=' . $next . '&searchString=' . $urlSearchString . '">' . 'Next' . '</a>';
            }
            $num .= '</div>';
        }

        $title = 'Search';
        include '../view/search.php';
        break;


    default:
        //page title
        $title = 'Home';
        include '../view/home.php';
}
