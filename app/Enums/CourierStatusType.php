<?php

namespace App\Enums;

enum CourierStatusType: int
{
    case ITEM_ACCEPTED_BY_COURIER = 1;
    case PICKED_UP = 2;
    case COLLECTED = 3;
    case SHIPPED = 4;
    case IN_TRANSIT = 5;
    case ARRIVED_AT_DESTINATION = 6;
    case OUT_FOR_DELIVERY = 7;
    case DELIVERED = 8;
    case UNSUCCESSFUL_DELIVERY_ATTEMPT = 9;

    public function toString(): string
    {
        return match ($this) {
            CourierStatusType::ITEM_ACCEPTED_BY_COURIER => "Item Accepted By Courier",
            CourierStatusType::PICKED_UP => "Picked Up",
            CourierStatusType::COLLECTED => "Collected",
            CourierStatusType::SHIPPED => "Shipped",
            CourierStatusType::IN_TRANSIT => "In Transit",
            CourierStatusType::ARRIVED_AT_DESTINATION => "Arrived At Destination",
            CourierStatusType::OUT_FOR_DELIVERY => "Out For Delivery",
            CourierStatusType::DELIVERED => "Delivered",
            CourierStatusType::UNSUCCESSFUL_DELIVERY_ATTEMPT => "Unsuccessful Delivery Attempt"
        };
    }
}
