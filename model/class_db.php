<?php

function get_all_classes(){
    global $database;
    $query = 'SELECT * FROM classes 
              ORDER BY class_id';
    $statement = $database->prepare($query);
    $statement->execute();
    $all_classes = $statement->fetchAll();
    $statement->closeCursor();
    return ($all_classes);
}