<?php

namespace App\Enums;

enum Role: int {
    case Admin = 1;
    case ParentRole = 2;
    case Student = 3;
    case Driver = 4;
}
