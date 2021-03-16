<?php 

function get_all_vehicles($sortby){
    global $database;
    if ($sortby=='year'){
        $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, T.type, C.class, M.make
                FROM vehicles LEFT JOIN types T ON T.type_id = vehicles.type_id
                LEFT JOIN classes C ON C.class_id = vehicles.class_id LEFT JOIN makes M ON M.make_id = vehicles.make_id
                ORDER BY vehicles.year ASC';
    }else{
        $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, T.type, C.class, M.make
                FROM vehicles  LEFT JOIN types T ON T.type_id = vehicles.type_id
                LEFT JOIN classes C ON C.class_id = vehicles.class_id LEFT JOIN makes M ON M.make_id = vehicles.make_id
                ORDER BY vehicles.price ASC';
    }
    $statement = $database->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return ($vehicles);
}
function get_vehicles($sortBy, $makeID, $typeID, $classID){
    if ($makeID && $typeID && && $classID) {
        if ($sortby=='year'){
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V LEFT JOIN types T ON T.type_id = V.type_id 
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE m.make_id = :makeID AND C.class_id = :classID AND T.typeID = :typeID
                    ORDER BY V.year ASC';
        }else{
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V  LEFT JOIN types T ON T.type_id = V.type_id
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE m.make_id = :makeID AND C.class_id = :classID AND T.typeID = :typeID
                    ORDER BY V.price ASC';
        }
    }else if ($makeID && $typeID) {
        if ($sortby=='year'){
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V LEFT JOIN types T ON T.type_id = V.type_id 
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE m.make_id = :makeID AND T.typeID = :typeID
                    ORDER BY V.year ASC';
        }else{
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V  LEFT JOIN types T ON T.type_id = V.type_id
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE m.make_id = :makeID AND T.typeID = :typeID
                    ORDER BY V.price ASC';
        }
    }else if ($makeID && $classID) {
        if ($sortby=='year'){
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V LEFT JOIN types T ON T.type_id = V.type_id 
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE m.make_id = :makeID AND C.class_id = :classID AND T.typeID = :typeID
                    ORDER BY V.year ASC';
        }else{
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V  LEFT JOIN types T ON T.type_id = V.type_id
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE m.make_id = :makeID AND C.class_id = :classID AND T.typeID = :typeID
                    ORDER BY V.price ASC';
        }
    }else if ($typeID && $classID) {
        if ($sortby=='year'){
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V LEFT JOIN types T ON T.type_id = V.type_id 
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE  C.class_id = :classID AND T.typeID = :typeID
                    ORDER BY V.year ASC';
        }else{
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V  LEFT JOIN types T ON T.type_id = V.type_id
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE C.class_id = :classID AND T.typeID = :typeID
                    ORDER BY V.price ASC';
        }
    }else if ($makeID) {
        if ($sortby=='year'){
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V LEFT JOIN types T ON T.type_id = V.type_id 
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE m.make_id = :makeID  ORDER BY V.year ASC';
        }else{
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V  LEFT JOIN types T ON T.type_id = V.type_id
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE m.make_id = :makeID  ORDER BY V.price ASC';
        }
    }else if ($typeID) {
        if ($sortby=='year'){
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V LEFT JOIN types T ON T.type_id = V.type_id 
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE T.typeID = :typeID  ORDER BY V.year ASC';
        }else{
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V  LEFT JOIN types T ON T.type_id = V.type_id
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE T.typeID = :typeID  ORDER BY V.price ASC';
        }
    }else if ($classID) {
        if ($sortby=='year'){
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V LEFT JOIN types T ON T.type_id = V.type_id 
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE  C.class_id = :classID ORDER BY V.year ASC';
        }else{
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V  LEFT JOIN types T ON T.type_id = V.type_id
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    WHERE C.class_id = :classID ORDER BY V.price ASC';
        }
    }else {
        if ($sortby=='year'){
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V LEFT JOIN types T ON T.type_id = V.type_id 
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                    ORDER BY V.year ASC';
        }else{
            $query = 'SELECT V.year, V.model, V.price, T.type, C.class, M.make
                    FROM vehicles V  LEFT JOIN types T ON T.type_id = V.type_id
                    LEFT JOIN classes C ON C.class_id = V.class_id LEFT JOIN makes M ON M.make_id = V.make_id
                     ORDER BY V.price ASC';
        }
    }

    $statement = $database->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->bindValue(':classID', $classID);
    $statement->bindValue(':makeID', $mekeID);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return ($vehicles);
}