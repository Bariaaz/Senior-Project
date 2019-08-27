<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' =>1,
            'name' => 'Administrator',
          ]);
        
        DB::table('roles')->insert([
            'id' =>2,
            'name' => 'Student',
          ]);  
        
        DB::table('roles')->insert([
            'id' =>3,
            'name' => 'Instructor',
          ]);    
          
        DB::table('users')->insert([
            'username' => env('INITIAL_USER_NAME'),
            'email' => env('INITIAL_USER_EMAIL'),
            'password' => Hash::make(env('INITIAL_USER_PASSWORDHASH')),
            'role_id'=>1,
            'is_active'=>1,
            'phone_Number'=>env('INITIAL_PHONE_NUMBER'),
            'fileNumber'=>env('INITIAL_FILE_NUMBER')

          ]);
    }
}
