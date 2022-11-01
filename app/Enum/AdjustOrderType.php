<?php

namespace App\Enum;

enum AdjustOrderType: string
{
    case 調撥 = 'adjust';
    case 調整 = 'transfer';
}
