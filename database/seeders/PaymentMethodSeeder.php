<?php

namespace Database\Seeders;

use Faker\Factory;
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
        $faker = Factory::create();

        $paymentMethods = ['Cash', 'GCash', 'PayMaya', 'Bank Transfer'];

        foreach($paymentMethods as $paymentMethod) {
            PaymentMethod::create([
                'name' => $paymentMethod,
                'account_name' => $paymentMethod,
                'account_number' => $faker->bankAccountNumber,
                'is_active' => 1
            ]);
        }
    }
}
