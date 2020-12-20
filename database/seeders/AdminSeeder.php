<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            "name" => "Bruno Martins",
            "email" => "bruno.mdsc@gmail.com",
            "password" => Hash::make("teste1 ! 3teste"),
            "approved_at" => date('Y-m-d h:i:s'),
            "condominio" => 'Alpha 2',
            "casa" => 'I2-36',
            "admin" => 1
        ]);
    }
}
