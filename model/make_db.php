<?php

function get_all_makes(){
    global $database;
    $query = 'SELECT * FROM makes
                ORDER BY make_id';
    $statement = $database->prepare($query);
    $statement->execute();
    $all_makes = $statement->fetchAll();
    $statement->closeCursor();
    return ($all_makes);  
}