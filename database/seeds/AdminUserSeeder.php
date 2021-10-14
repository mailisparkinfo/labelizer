<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

   public function run()
    {
        User::create(array(
        'name'     => 'Admin',
        //'last_name'     => 'Admin',
        'user_type'     => 'Admin',
        'phone'     => '6215221552',
        'email_verified_at'     => '2021-01-03',
      //  'contact_no'     => 'Admin',
        'email'    => 'admin@admin.com',
       // 'role'     => 'admin',
        'password' => Hash::make('123456'),
    ));
    }

}