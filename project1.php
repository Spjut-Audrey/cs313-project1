<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf=8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Car Maintenence Tracker</title>

        <!-- css -->
        <link rel="stylesheet" href="main.css">
        <!-- js -->
        <script src="project1.js"></script>
    </head>
    <body>
        <button onclick="showForm()">Add Car</button>
        <!-- hide until "add car" button is pressed -->
        <form method="POST" action="index.php" class="hidden" id="addCarForm">
            <!-- car make -->
            <input type="radio" name="carMake" value="chevy" id="chevy">Chevrolet<br>
            <input type="radio" name="carMake" value="Toyota" id="Toyota">Toyota<br>
            <input type="radio" name="carMake" value="Ford" id="Ford">Ford<br>
            <input type="radio" name="carMake" value="Honda" id="Honda">Honda<br>
            <input type="radio" name="carMake" value="Hyundai" id="Hyundai">Hyundai<br>

            <!-- car type/model -->
            <!-- might be too difficult without an extensive database -->
            <!-- <input type="text" name="carModel" value="Please Enter Car Model" id="carModel"><br> -->

            <!-- car miles -->
            <input type="number" name="carMiles" id="carMiles"><br>

            <input type="submit" value="Submit">
            <input type="hidden" name="action" value="checkCar">

        </form>

        <!-- show current cars if added don't show if nothing there(check added with php) -->
        <?php
            if ( car array is < 0) {
                echo '<div class="showCar"></div>';
            } else {
                echo '';
            }
        ?>
    </body>
</html>