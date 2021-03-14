<?php

    require('model/database.php');
    require('model/vehicle.php');

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_all_vehicles';
        }
    }

    switch($action) {
        default:
            $all_vehicles = get_all_vehicles();
    }
    
