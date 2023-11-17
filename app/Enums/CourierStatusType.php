<?php

namespace App\Enums;

enum CourierStatusType: int
{
    case ITEM_ACCEPTED_BY_COURIER = 1;
    case COLLECTED = 2;
    case SHIPPED = 3;
    case IN_TRANSIT = 4;
    case ARRIVED_AT_DESTINATION = 5;
    case OUT_FOR_DELIVERY = 6;
    case READY_TO_PICKUP = 7;
    case DELIVERED = 8;
    case PICKED_UP = 9;
    case UNSUCCESSFUL_DELIVERY_ATTEMPT = 10;
}
