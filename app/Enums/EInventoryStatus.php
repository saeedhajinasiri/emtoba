<?php

namespace App\Enums;

class EInventoryStatus extends BaseEnum
{
    const existing = 1;
    const not_existing = 2;
    const soon = 3;
    const stop_production = 4;
}
