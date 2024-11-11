<?php

function update_room_status($room_tenants, $max_capacity){
    if ($room_tenants == 0){
        $room_status = "Available";
    } else if ($room_tenants < $max_capacity) {
        $room_status = "Occupied";
    } else if ($room_tenants == $max_capacity) {
        $room_status = "Not Available";
    }

    return $room_status;
}