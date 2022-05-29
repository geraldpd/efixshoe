<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethods = ['Cash', 'GCash', 'PayMaya', 'Bank Transfer'];

        foreach($paymentMethods as $paymentMethod) {
            PaymentMethod::create([
                'name' => $paymentMethod,
                'account_name' => $paymentMethod,
                'account_number' => $paymentMethod != 'Cash' ? rand(10000,99999) : 0,
                'is_active' => 1
            ]);
        }
    }
}
