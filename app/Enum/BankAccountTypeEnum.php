<?php

namespace App\Enum;

// TODO enum 驗證方式
// https://stackoverflow.com/questions/28976658/laravel-in-validation-or-validation-by-enum-values
enum BankAccountTypeEnum: string
{
    case 現金帳戶 = 'cash_account';
    case 銀行帳戶 = 'bank_account';
}
