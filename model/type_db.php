<?php

function get_all_types(){
    global $database;
    $query = 'SELECT * 
              FROM types 
              ORDER BY type_id';
    $statement = $database->prepare($query);
    $statement->execute();
    $all_types = $statement->fetchAll();
    $statement->closeCursor();
    return ($all_types);  
}

function get_type_name_from_var($typeID, $types){
    foreach ($types as $type) {
        if ($type['type_id'] == $typeID) {
            $type_name = $type['type'];
            break;
        }
    } 
    return $type_name;
}
