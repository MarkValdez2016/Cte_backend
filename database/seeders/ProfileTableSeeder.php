<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Profile::truncate();

        Profile::create([
            'last_name' => 'Admin',
            'first_name' => 'Secretary',
        ]);
    }
}
