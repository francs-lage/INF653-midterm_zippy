<?php

function get_all_makes(){
    global $database;
    $query = 'SELECT * 
              FROM makes
              ORDER BY make_id';
    $statement = $database->prepare($query);
    $statement->execute();
    $all_makes = $statement->fetchAll();
    $statement->closeCursor();
    return ($all_makes);  
}

function get_make_name_from_var($makeID, $makes){
    foreach ($makes as $make) {
        if ($make['make_id'] == $makeID) {
            $make_name = $make['make'];
            break;
        }
    } 
    return $make_name;
}
