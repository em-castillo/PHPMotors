<?php
// 500 page error
ini_set('display_errors', '1');

// This is the Vehicles Controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicles model
require_once '../model/vehicles-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the uploads model
require_once '../model/uploads-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/vehicles/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';

$navList = navBar($classifications);

// Build a dynamic drop-down select list
// $classificationList = '<select name="classificationId">';
// $classificationList .= "<option selected disabled>Choose Car Classification</option>";
// foreach ($classifications as $classification) {
//     $classificationList .= "<option value = \"$classification[classificationId]\">$classification[classificationName]</option>";
// }
// $classificationList .= '</select>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'add-class':
        //page title
        $title = 'Car Classification';
        include '../view/add-class.php';
        break;

    case 'Classification':
        // Filter and store the data
        $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));


        // Check for missing data
        if (empty($classificationName)) {
            $message = '<p id="text">Please provide information for all empty form fields.</p>';
            include '../view/add-class.php';
            exit;
        }

        // Send the data to the model
        $regOutcome = regCar($classificationName);

        // Check and report the result
        if ($regOutcome === 1) {
            $message = "";
            header("Location:index.php");
            // include '../view/vehicle-man.php';
            exit;
        } else {
            $message = "<p id='text'>Sorry, the $classificationName addition failed. Please try again.</p>";
            include '../view/add-class.php';
            exit;
        }
        break;


    case 'add-vehicle':
        //page title
        $title = 'Add Vehicle';
        include '../view/add-vehicle.php';
        break;


    case 'Vehicle':
        // Filter and store the data
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));

        // Check for missing data
        if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
            $message = '<p id="text">Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit;
        }

        // Send the data to the model
        $regOutcome = regInventory($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

        // Check and report the result
        if ($regOutcome === 1) {
            $message = "<p id='text'>The $invMake $invModel was added succesfully!</p>";
            include '../view/add-vehicle.php';
            exit;
        } else {
            $message = "<p id='text'>Sorry, the vehicle addition failed. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        break;


    case 'login':
        //page title
        $title = 'Login';
        include '../view/login.php';
        break;

    case 'registration':
        //page title
        $title = 'Registration';
        include '../view/registration.php';
        break;

    case 'error':
        include '../view/500.php';
        break;


        // Get vehicles by classificationId 
        // * Used for starting Update & Delete process 
    case 'getInventoryItems':
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId);
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray);
        break;


        // Modify link
    case 'mod':
        $change = 'Modify';
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = '<p id="text">Sorry, no vehicle information could be found.</p>';
        }
        include '../view/vehicle-update.php';
        exit;
        break;

        // Update vehicle information
    case 'updateVehicle':
        // Filter and store the data
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // Check for missing data
        if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
            $message = '<p id="text">Please provide information for all empty form fields.</p>';
            include '../view/vehicle-update.php';
            exit;
        }

        // Send the data to the model
        $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);

        // Check and report the result
        if ($updateResult) {
            $message = "<p id='text'>Congratulations, the $invMake $invModel was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p id='text'>Sorry, the vehicle update failed. Please try again.</p>";
            include '../view/vehicle-update.php';
            exit;
        }
        break;

        // Delete link
    case 'del':
        //page title
        $change = 'Delete';
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = '<p id="text">Sorry, no vehicle information could be found.</p>';
        }
        include '../view/vehicle-delete.php';
        exit;
        break;


        // Deletes vehicle information
    case 'deleteVehicle':
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $deleteResult = deleteVehicle($invId);
        if ($deleteResult) {
            $message = "<p id='text'>Congratulations the $invMake $invModel was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p id='text'>Error: $invMake $invModel was not
            deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        }
        break;

        // nav classification links
    case 'classification':
        $title = "Vehicles";
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $vehicles = getVehiclesByClassification($classificationName);
        if (!count($vehicles)) {
            $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
        } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }
        // echo $vehicleDisplay;
        // exit;
        include '../view/classification.php';
        break;

        // Vehicle detailed info
    case 'vehicle-info':

        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $detailedInfo = getDetailedInfo($invId);
        // call function getThumbnailImg($invId) from uploads-model
        $tnImg = getThumbnailImg($invId);
        // call function buildTnHtm($humbnailImgs) from functions.php
        $createTn = buildTnHtml($tnImg, $detailedInfo);
        if (count($detailedInfo) < 1) {
            $message = "<p id='text'>Sorry, no vehicle information could be found.</p>";
        } else {
            $vehicleDetails = buildVehicleDetailedInfo($detailedInfo);
        }
        include '../view/vehicle-detail.php';
        break;

    default:
        //page title
        $title = 'Vehicle Management';
        $classificationList = buildClassificationList($classifications);

        include '../view/vehicle-man.php';
        break;
}
