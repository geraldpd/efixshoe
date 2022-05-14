<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Deep Clean', 'Unyellowing', 'Reglue', 'Restitch', 'Restore'];

        foreach($services as $service) {
            Service::create([
                'name' => $service,
                'description' => $service,
                'cost' => rand(100,900)
            ]);
        }
    }
}
