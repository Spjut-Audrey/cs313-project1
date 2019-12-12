<?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
       }
?><!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf=8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Car Maintenence Tracker</title>

        <!-- css -->
        <link rel="stylesheet" href="../main.css">

        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <!-- js -->
        <script src="../project1.js"></script>
    </head>
    <body>
        <div id="form">
            <h1>Car Maintenence Tracker</h1>

            <button onclick="showForm()">Add Car</button>
            <!-- hide until "add car" button is pressed -->
            <form method="post" action="../index.php" class="hidden" id="addCarForm">
                <!-- car make -->
                <input type="radio" name="carMake" value="Chevrolet" >Chevrolet<br>
                <input type="radio" name="carMake" value="Toyota">Toyota<br>
                <input type="radio" name="carMake" value="Ford">Ford<br>
                <input type="radio" name="carMake" value="Honda">Honda<br>
                <input type="radio" name="carMake" value="Hyundai">Hyundai<br><br>

                <!-- car type/model -->
                <!-- might be too difficult without an extensive database -->
                <!-- <input type="text" name="carModel" value="Please Enter Car Model" id="carModel"><br> -->

                <!-- car miles -->
                Current Car Mileage:<input type="number" name="carMiles" id="carMiles"><br><br>

                <input type="submit" value="Submit" class="button">
                <input type="hidden" name="action" value="addCar">

            </form>
        </div>
       <br><br>
        <!-- show current cars if added don't show if nothing there(check added with php)
        message shows instead-->
        <?php
            if (isset($message)) {
                echo $message;
            }; 
            
            echo $carsList;
        ?>
    </body>
</html>