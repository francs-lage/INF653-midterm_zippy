<?php

    require('model/database.php');
    require('model/vehicle_db.php');

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_all_vehicles';
        }
    }

    switch($action) {
        case 'list_all_vehicles':
            $all_vehicles = get_all_vehicles();
            include ('view/vehicle_list.php');
            break;
        default:
            $action = 'list_all_vehicles';
            include('.');
            break;
    }