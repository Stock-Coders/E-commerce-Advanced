<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
Use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([ //ID = 1 (admin)
            'name'       => "StockCoders",
            'email'      => 'admin@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'admin',
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,
        ]);

        $user = User::create([ //ID = 2 (moderator)
            'name'       => "user_moderator",
            'email'      => 'moderator@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'moderator',
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,
        ]);

        $user = User::create([ //ID = 3 (customer)
            'name'       => "user_customer",
            'email'      => 'customer@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'customer',
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,
        ]);
    }
}
