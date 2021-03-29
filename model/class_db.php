<?php

function get_all_classes(){
    global $database;
    $query = 'SELECT * 
              FROM classes 
              ORDER BY class_id';
    $statement = $database->prepare($query);
    $statement->execute();
    $all_classes = $statement->fetchAll();
    $statement->closeCursor();
    return ($all_classes);
}

function get_class_name_from_var($classID, $classes){
    foreach ($classes as $class) {
        if ($class['class_id'] == $classID) {
            $class_name = $class['class'];
            break;
        }
    } 
    return $class_name;
}