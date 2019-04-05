<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // standard users
        $users = array(
            [
                'name' => 'admin',
                'email' => 'srazzano15@gmail.com',
                'password' => Hash::make('hunting789'),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Mac Bunbury',
                'email' => 'mac@timelessrefinery.com',
                'password' => Hash::make('Timeless123!'),
                'created_at' => Carbon::now()
            ]
        );
        // create each on migration
        foreach ($users as $user)
        {
            User::create($user);
        }

        //$this->call(BatchBagsSeeder::class);
    }
}
