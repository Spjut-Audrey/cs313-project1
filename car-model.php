<?php
// make a function that adds car to a database
function regCar($cars_make, $cars_miles) {
    $db = getDB();
    $sql = 'INSERT INTO cars (cars_make, cars_miles) VALUES (:cars_make, :cars_miles)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cars_make', $cars_make, PDO::PARAM_STR);
    $stmt->bindValue(':cars_miles', $cars_miles, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();

    return $rowsChanged;
    }

// make request to db to for car info
function getCarInfo() {
    $db = getDB();
    $sql = 'SELECT cars_make cars_model cars_id FROM cars ORDER BY cars_id ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $stmt->closeCursor();

    return $cars;
}

// delete car based on id
function deleteProduct($cars_id) {
    $db = getDB();
    $sql = 'DELETE FROM cars WHERE cars_id = :cars_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cars_id', $cars_id, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    
    return $rowsChanged;
   }


?>