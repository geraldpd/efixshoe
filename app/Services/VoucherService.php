<?php

namespace App\Services;

use App\Models\Voucher;

class VoucherService
{
    public static function generateCode(int $count = 1, $prefix = 'EFIX')
    {
        $batch = [];
        for ($i = 0; $i < $count; $i++) {
            $batch[] = self::generateRandomString($prefix);
        }

        return $batch;
    }

    static function generateRandomString($prefix) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);
        $random_string = '';

        for ($i = 0; $i < 5; $i++) {
            $random_string .= $characters[rand(0, $characters_length - 1)];
        }

        return $prefix ? $prefix.'-'.$random_string : $random_string;
    }
}