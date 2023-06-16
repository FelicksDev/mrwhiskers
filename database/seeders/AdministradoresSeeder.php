<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin=new User;
        $admin->name='Felix Sarmiento';
        $admin->email='thedarkomf@gmail.com';
        $admin->username='admin';
        $admin->password='admin';
        $admin->assignRole('admin');
        $admin->save();

    }
}
