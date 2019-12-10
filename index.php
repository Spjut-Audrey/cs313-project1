<?php
// start session
session_start();

// connect to db
function dbConnect() {
    $server = 'localhost';
    $database = 'project1';
    $user = 'springiClient';
    $password = '7S7MmWOWytiVbUUZ';
    $dsn = 'mysql:host=' . $server . ';dbname=' . $database;

    //error handling
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $dbLink = new PDO($dsn, $user, $password, $options);
        return $dbLink;
    } catch (PDOException $exc) {
        header('location: project1.php');
    }
}

$action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
    }

switch ($action) {
    case 'addCar':
        // filter data first
        $carMake = filter_input(INPUT_POST, 'carMake');
        $carMiles = filter_input(INPUT_POST, 'carMiles');

        //check for missing data
        if(empty($carMake) || empty($carMiles)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            header('location: project1.php');
            exit;
        }

        //send data to model
        $addCarOutcome = addCar($carMake, $carMiles);

        //make sure outcome worked
        if($checkCarOutcome === 1) {
            $message = "<p>Thanks for checking your car! ";
            exit;
        } else {
            $message = "<p>Sorry, but adding car failed. Please try again</p>";
            exit;
        }

        
        header('location: project1.php');
    break;
    case 'checkCar': 
        $cars_id = filter_input(INPUT_POST, 'cars_id');
        // get car details from db
        $carData = getCarById($cars_id)
        // calculate what next service is needed based on mileage
         
        // pass what info to html page and display to user
    break;
    default: 
        include 'project1.php';
}

?>