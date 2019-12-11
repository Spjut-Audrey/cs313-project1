<?php
// make a function that adds car to a database
function regCar($cars_make, $cars_miles) {

// connect to db
$db = dbConnect();

// sql statement
$sql = 'INSERT INTO cars (cars_make, cars_miles) VALUES (:cars_make, :cars_miles)';

// prepare sql
$stmt = $db->prepare($sql);

// replace placeholders in SQL w/ actual values in vars & tells db what type of data it is
$stmt->bindValue(':cars_make', $cars_make, PDO::PARAM_STR);
$stmt->bindValue(':cars_miles', $cars_miles, PDO::PARAM_INT);

// insert data
$stmt->execute();

// ask rows changed
$rowsChanged = $stmt->rowCount();

// close db interaction
$stmt->closeCursor();

// return succesful rows changed
return $rowsChanged;
}

// make request to db to for car info
?>