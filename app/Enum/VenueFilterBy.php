<?php

namespace App\Enum;

enum VenueFilterBy: string
{
    case All = 'all';

    case VenueType = 'venueType';
    case PropertyType = 'propertyType';
    case EventList = 'eventList';
}