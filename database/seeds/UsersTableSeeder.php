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
        $super_admin = [
            'name' => 'yogi',
            'username' => 'yogi',
            'phone' => '082349142532',
            'address' => 'kesiman',
            'email' => 'yogi@gmail.com',
            'gender' => 1,
            'password' => bcrypt('123456')
        ];

        $admin = [
            'name' => 'widi',
            'username' => 'widi',
            'phone' => '082349142531',
            'address' => 'surabi',
            'email' => 'widi@gmail.com',
            'gender' => 1,
            'password' => bcrypt('123456')
        ];

        $sa =  \App\User::create($super_admin);
        $sa->assignRole('kepala-bidang');

        $a =  \App\User::create($admin);
        $a->assignRole('admin');
    }
}
