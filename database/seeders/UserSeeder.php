<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	foreach(config('efixshoe.roles') as $role) {
	        $user = User::create([
				'first_name' => $role,
                'last_name' => $role,
                'contact_number' => '09'.rand(111111111, 99999999),
				'email' => Str::lower($role.'@'.config('app.name').'.com'),
				'email_verified_at' => Carbon::now(),
				'password' => bcrypt('password'),
				'address' => 'address',
                'remember_token' => Str::random(10),
	        ]);

	        $user->assignRole($role);
        }
    }
}
