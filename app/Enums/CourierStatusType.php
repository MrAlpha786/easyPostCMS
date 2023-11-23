<?php

namespace App\Enums;

enum CourierStatusType: int
{
    // Enumeration members with associated integer values
    case ITEM_ACCEPTED_BY_COURIER = 1;
    case PICKED_UP = 2;
    case COLLECTED = 3;
    case SHIPPED = 4;
    case IN_TRANSIT = 5;
    case ARRIVED_AT_DESTINATION = 6;
    case OUT_FOR_DELIVERY = 7;
    case DELIVERED = 8;
    case UNSUCCESSFUL_DELIVERY_ATTEMPT = 9;
    case RETURN = 10;

    // Method to return a string representation of the enumeration member
    public function toString(): string
    {
        return match ($this) {
            CourierStatusType::ITEM_ACCEPTED_BY_COURIER => "Item Accepted",
            CourierStatusType::PICKED_UP => "Pickup Scheduled",
            CourierStatusType::COLLECTED => "Collected",
            CourierStatusType::SHIPPED => "Shipped",
            CourierStatusType::IN_TRANSIT => "In Transit",
            CourierStatusType::ARRIVED_AT_DESTINATION => "Arrived At Destination",
            CourierStatusType::OUT_FOR_DELIVERY => "Out For Delivery",
            CourierStatusType::DELIVERED => "Delivered",
            CourierStatusType::UNSUCCESSFUL_DELIVERY_ATTEMPT => "Unsuccessful Delivery",
            CourierStatusType::RETURN => "Returned Back"
        };
    }
}
