<?php
// connect to database 
require_once('dbconnect.php');
// connect to functions model
require_once('car-model.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
    }

echo $action;

switch($action) {
    case 'addCar':
        // add car to cars table
        $cars_make = $_POST['carMake'];
        $cars_miles = filter_input(INPUT_POST, 'carMiles', FILTER_VALIDATE_INT);

        // echo $_POST['carMake'];

        // echo $action;
        // echo $cars_make;
        // print($cars_make);
        // print($cars_miles);

        // exit;

        // Run basic checks, return if errors
        if (empty($cars_make) || empty($cars_miles)) {
            $message = '<p class="notice">Please enter a make and miles of your car.</p>';
            header('location: index.php');
            exit;
            }
        

        //send data to model
        $carOutcome = regCar($cars_make, $cars_miles);

        // echo $carOutcome;
        // echo $action;
        // echo $cars_make;
        // print($cars_miles);

        // exit;

        //make sure outcome worked
        if($carOutcome == 1) {
            $message = "Thanks for adding your car!";
            header('Location: index.php?action=buildTable');
            exit;
        } else {
            $message = "<p>Sorry adding car failed. Please try again</p>";
            header('Location: index.php');
            exit;
        }
    break;
    case 'del':
        $cars_make = filter_input(INPUT_POST, 'cars_make', FILTER_SANITIZE_STRING);
        $cars_id = filter_input(INPUT_POST, 'cars_id', FILTER_SANITIZE_NUMBER_INT);
    
        $deleteResult = deleteProduct($cars_id);
        
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations, $invName was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        } else {
            $message = "<p class='notice'>Error: $invName was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        }
    break; 
    case 'buildTable':  
        // get car info for displaying to user   
        $cars_id = filter_input(INPUT_GET, 'cars_id', FILTER_SANITIZE_STRING);
        $cars = getCarInfo($cars_id);

        echo "hey";

        // check mileage against mileage table in switch probably not as db table
        // decided to use if statement because this stackoverflow said it was faster loading
        // link: https://stackoverflow.com/questions/6665997/switch-statement-for-greater-than-less-than
        if ($cars[cars_miles] <= 3000) {
            $mileRecommend = 'Change Oil';
        } else if ($cars <= 30000) {
            $mileRecommend = 'Get Tune Up Service';
        } else if ($cars <= 50000) {
            $mileRecommend = 'Check Shocks & Struts';
        } else if ($cars <= 60000) {
            $mileRecommend = 'Replace Timing Belts';
        } else if ($cars <= 70000) {
            $mileRecommend = 'Check Pumps';
        } else if ($cars <= 80000) {
            $mileRecommend = 'Replace Battery';
        } else if ($cars <= 90000) {
            $mileRecommend = 'Get Tune Up Service';
        } else {
            $mileRecommend = 'Get Transmission & Engine Evaluation';
        }

        
        // show car and recommendation in a table of sorts? here or html?
        if (count($cars) > 0) {
            $carsList = '<table class="carsTable">';
            $carsList .= '<thead>';
            $carsList .= '<tr><th>Car Make</th><th>Car Miles</th><th>Recommended Maintenence</th></tr>';
            $carsList .= '</thead>';
            $carsList .= '<tbody>';

            foreach ($cars as $car) {
                $carsList .= "<tr><td class='carData'>$car[cars_make]</td>";
                $carsList .= "<td>$car[cars_miles]</td>";
                $carsList .= "<td>$mileRecommend</td>";
                $prodList .= "<td><a href='index.php?action=del&id=$car[cars_id]' title='Click to delete'>Delete</a></td></tr>";
            }
            $carsList .= '</tbody></table>';

        } else {
            $message = '<p class="notify">Sorry, no cars were returned.</p>';
        }

        header('location: views/project1.php');
        break;
    }
?>