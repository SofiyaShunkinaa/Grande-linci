<?php

namespace App\Enum;

enum StatusType: string {
    case Available = 'Available';
    case AtHome = 'At home';
    case Reserved = 'Reserved';
}