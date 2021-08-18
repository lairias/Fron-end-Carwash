<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

      $administrador =  User::create([
            'name' => 'Per administrador',
            'email' => 'admin@admin1.com',
            'password' => Hash::make('123456789'),
        ]);

        $administrador->assignRole('administrador');
        
//empleado
   
    }
}
