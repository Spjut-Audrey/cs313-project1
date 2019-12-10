<!DOCTYPE html>
<html lang="en-us">
    <head>
         <?php
            include __DIR__ . '/common/head.php';
        ?>  

        <title>Car Maintenence Tracker</title>

    </head>
    <body>
        <form method="POST" action="index.php">
            <!-- car make -->
            <input type="radio" name="carMake" value="chevy" id="chevy">Chevrolet<br>
            <input type="radio" name="carMake" value="Toyota" id="Toyota">Toyota<br>
            <input type="radio" name="carMake" value="Ford" id="Ford">Ford<br>
            <input type="radio" name="carMake" value="Honda" id="Honda">Honda<br>
            <input type="radio" name="carMake" value="Hyundai" id="Hyundai">Hyundai<br>

            <!-- car model -->
            <!-- might be too difficult without an extensive database -->
            <!-- <input type="text" name="carModel" value="Please Enter Car Model" id="carModel"><br> -->

            <!-- car miles -->
            <input type="number" name="carMiles" id="carMiles"><br>

            <input type="submit" value="Submit">
            <input type="hidden" name="action" value="checkCar">

        </form>
    </body>
</html>