<?php 

function get_all_vehicles($sortby){
    global $database;
    if ($sortby == 'year'){
        $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, T.type, C.class, M.make
                  FROM vehicles
                  LEFT JOIN types T   ON T.type_id  = vehicles.type_id
                  LEFT JOIN classes C ON C.class_id = vehicles.class_id 
                  LEFT JOIN makes M   ON M.make_id  = vehicles.make_id
                  ORDER BY vehicles.year ASC';  
    }else{
        $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, T.type, C.class, M.make
                  FROM vehicles  
                  LEFT JOIN types T   ON T.type_id  = vehicles.type_id
                  LEFT JOIN classes C ON C.class_id = vehicles.class_id 
                  LEFT JOIN makes M   ON M.make_id  = vehicles.make_id
                  ORDER BY vehicles.price ASC';
    }
    $statement = $database->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return ($vehicles);
}