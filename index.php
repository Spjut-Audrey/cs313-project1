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

// echo $action;

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
            header("Location: index.php?action=buildTable");
            exit;
        } else {
            $message = "<p>Sorry adding car failed. Please try again</p>";
            header('Location: index.php');
            exit;
        }
    break;
    case 'del':
        echo $action;
        $cars_id = $_GET["id"];
        echo $cars_id;
        
        echo $action;

        $deleteResult = deleteCar($cars_id);
        
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations! Car was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: index.php?action=buildTable');
            exit;
        } else {
            $message = "<p class='notice'>Error: car was not deleted.</p>";
            $_SESSION['message'] = $message; 
            header('location: index.php?action=buildTable');
            exit;
        }
    break; 
    case 'buildTable':  
        // print($action);
        // // get car info for displaying to user   
        // print(" after filter_input");

        $cars = getCarInfo();
        // print("end");

        // echo "hey";
        // exit;

        // print_r($cars);


        
        // show car and recommendation in a table of sorts? here or html?
        if(count($cars) > 0) {
            $carsList = '<table class="carsTable">';
            $carsList .= '<thead>';
            $carsList .= '<tr><th>Car Make</th><th>Car Miles</th><th colspan="2">Recommended Maintenence</th></tr>';
            $carsList .= '</thead>';
            $carsList .= '<tbody>';

            foreach ($cars as $car) {
                // check mileage against mileage table in switch probably not as db table
                // decided to use if statement because this stackoverflow said it was faster loading
                // link: https://stackoverflow.com/questions/6665997/switch-statement-for-greater-than-less-than
                if ($car['cars_miles'] <= 3000) {
                    $mileRecommend = 'Change Oil';
                } else if ($car['cars_miles'] <= 30000) {
                    $mileRecommend = 'Get Tune Up Service';
                } else if ($car['cars_miles'] <= 50000) {
                    $mileRecommend = 'Check Shocks & Struts';
                } else if ($car['cars_miles'] <= 60000) {
                    $mileRecommend = 'Replace Timing Belts';
                } else if ($car['cars_miles'] <= 70000) {
                    $mileRecommend = 'Check Pumps';
                } else if ($car['cars_miles'] <= 80000) {
                    $mileRecommend = 'Replace Battery';
                } else if ($car['cars_miles'] <= 90000) {
                    $mileRecommend = 'Get Tune Up Service';
                } else {
                    $mileRecommend = 'Get Transmission & Engine Evaluation';
                }


                $carsList .= "<tr><td class='carData'>$car[cars_make]</td>";
                $carsList .= "<td>$car[cars_miles]</td>";
                $carsList .= "<td>$mileRecommend</td>";
                $carsList .= "<td><a href='index.php?action=del&id=$car[cars_id]' title='Click to delete'>Delete</a></td></tr>";
            }
            $carsList .= '</tbody></table>';

        } else {
            $message = '<p class="notify">Sorry, no cars were returned.</p>';
        }

        include 'views/project1.php';
        break;
    }
?>