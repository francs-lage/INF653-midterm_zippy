<?php
    require('model/database.php');  // try wihout ../
    require('model/vehicle_db.php');
    require('model/make_db.php');
    require('model/type_db.php');
    require('model/class_db.php');

    // filter and allocate the data that comes from the forms in vehicle_list
    $makeID = filter_input(INPUT_GET, 'selectMake', FILTER_VALIDATE_INT);
    $typeID = filter_input(INPUT_GET, 'selectType', FILTER_VALIDATE_INT);
    $classID = filter_input(INPUT_GET, 'selectClass', FILTER_VALIDATE_INT);
    $sortBy = filter_input(INPUT_GET,'sortby', FILTER_SANITIZE_STRING);


    // get data from the database
    $vehicles = get_all_vehicles($sortBy);
    $makes = get_all_makes();
    $types = get_all_types();
    $classes = get_all_classes(); 

    // This following block of code comes from the midterm official solution
    // Author: Dave Gray - use of this code is authorized for following course assignments
    // changes: names of functions and parameters list
    // the objective is to filter the array $vehicles according with the user choices
    if ($makeID) {
        $make_name = get_make_name_from_var($makeID, $makes);
        $vehicles = array_filter($vehicles, function($array) use ($make_name) {
            return $array["make"] === $make_name;
        });
    } 
    if ($typeID) {
        $type_name = get_type_name_from_var($typeID, $types);
        $vehicles = array_filter($vehicles, function($array) use ($type_name) {
            return $array["type"] === $type_name;
        });
    }
    if ($classID) {
        $class_name = get_class_name_from_var($classID, $classes);
        $vehicles = array_filter($vehicles, function($array) use ($class_name) {
            return $array["class"] === $class_name;
        });
    }

    include('view/vehicle_list.php');