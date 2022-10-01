<?php

namespace App\Enum;

enum SalesOrderType: string
{
    case 銷貨 = 'sales';
    case 退貨 = 'return';
}
