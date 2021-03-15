<?php

function get_all_types(){
    global $database;
    $query = 'SELECT * FROM types 
              ORDER BY type_id';
    $statement = $database->prepare($query);
    $statement->execute();
    $all_types = $statement->fetchAll();
    $statement->closeCursor();
    return ($all_types);  
}