<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'nim' => '11111111',
            'name' => 'I Komang Aditya Abimanyu',
            'no_hp' => '085712345678',
            'hak_akses' => 'Mahasiswa',
            'email' => 'ikomang.aditya@gmail.com',
            'password' => bcrypt('253660'),
            'status' => 'Aktif',
        ]);

        User::create([
            'nim' => '11111112',
            'name' => 'Jane Doe',
            'no_hp' => '087814785236',
            'hak_akses' => 'Mahasiswa',
            'email' => 'jane.doe@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 'Tidak Aktif',
        ]);

        User::create([
            'nim' => 'renaldis4',
            'name' => 'Renaldi Soeryadi',
            'no_hp' => '087812356789',
            'hak_akses' => 'Dosen',
            'email' => 'renaldi.soeryadi@gmail.com',
            'password' => bcrypt('7887417'),
            'status' => 'Aktif',
        ]);

        User::create([
            'nim' => '1o1410',
            'name' => 'John Doe',
            'no_hp' => '08710404050074',
            'hak_akses' => 'Admin',
            'email' => 'john.doe@gmail.com',
            'password' => bcrypt('iad68258'),
            'status' => 'Aktif',
        ]);
    }
}
