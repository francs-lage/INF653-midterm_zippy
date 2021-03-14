<?php 

function get_all_vehicles(){
    global $database;
    $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, types.type, classes.class, makes.make
            FROM vehicles 
            LEFT JOIN types ON types.type_id = vehicles.type_id
            LEFT JOIN classes ON classes.class_id = vehicles.class_id
            LEFT JOIN makes ON makes.make_id = vehicles.make_id
            ORDER BY vehicles.price ASC';

    $statement = $database->prepare($query);
    $statement->execute();
    $all_vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return ($all_vehicles);
}