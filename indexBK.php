<?php
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/make_db.php');
    require('model/type_db.php');
    require('model/class_db.php');

    $makeID = filter_input(INPUT_POST, 'selectMake', FILTER_VALIDATE_INT);
    $typeID = filter_input(INPUT_POST, 'selectType', FILTER_VALIDATE_INT);
    $classID = filter_input(INPUT_POST, 'selectClass', FILTER_VALIDATE_INT);
    $sortBy = filter_input(INPUT_POST,'sortby', FILTER_SANITIZE_STRING);

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_all_vehicles';
        }
    }

    switch($action) {
        case 'list_vehicles':
            $all_makes = get_all_makes();
            $all_types = get_all_types();
            $all_classes = get_all_classes(); 
            $vehicles = get_vehicles($sortBy, $makeID, $typeID, $classID);
            include ('view/vehicle_list.php');
            break;
         
        case 'list_all_vehicles':
            $all_makes = get_all_makes();
            $all_types = get_all_types();
            $all_classes = get_all_classes();    
            $vehicles = get_all_vehicles($sortby);
            include ('view/vehicle_list.php');
            break;

        default:
            $action = 'list_all_vehicles';
            include('.');
            break;
    }