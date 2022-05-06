<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Status::truncate();

        Status::create(['name' => 'Active']);
        Status::create(['name' => 'In-Active']);

        Status::create(['name' => 'Pending']);
        Status::create(['name' => 'Approve']);
        Status::create(['name' => 'Decline']);
    }
}
