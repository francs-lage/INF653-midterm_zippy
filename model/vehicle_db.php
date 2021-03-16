<?php 

function get_all_vehicles(){
    global $database;
    $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
            FROM vehicles V
            LEFT JOIN types T ON T.type_id = V.type_id
            LEFT JOIN classes C ON C.class_id = V.class_id
            LEFT JOIN makes M ON M.make_id = V.make_id
            ORDER BY V.price ASC';

    $statement = $database->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return ($vehicles);
}

function get_vehicles($sortBy, $makeID, $typeID, $classID){
    global $database;
    $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
            FROM vehicles V
            INNER JOIN types T ON T.type_id = V.type_id
            INNER JOIN classes C ON C.class_id = V.class_id
            INNER JOIN makes M ON M.make_id = V.make_id
            ORDER BY V.year ASC';

    $statement = $database->prepare($query);

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return ($vehicles);
}