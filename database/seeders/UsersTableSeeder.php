<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Role;
use App\Models\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        User::truncate();

        DB::table('role_user')->truncate();
        DB::table('profile_user')->truncate();


        $admin = User::create([
            // 'name' => 'Admin',
            'email' => 'admin@wmsu.edu.ph',
            'password' => Hash::make('secret'),
        ]);

        $role = Role::where('name','Admin')->first();
        $admin->role()->attach($role);
        
        $profile = Profile::where('id', '1')->first();
        $admin->profile()->attach($profile);
    }
}
