<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Manajer',
            'email' => 'manajer@gmail.com',
            'telepon' => '082237188923',
            'tempat_lahir' => 'Denpasar',
            'tanggal_lahir' => '1998/12/15',
            'username' => 'manajer',
            'password' => bcrypt(12345678),
            'foto' => 'assets/uploads/images/default.png',
            'role' => 'Manajer',
            'status' => true
        ]);
    }
}
