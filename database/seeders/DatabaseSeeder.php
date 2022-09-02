<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pool;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $vehicles = array(
            array('name' => 'Mitsubishi L300', 'type' => 'Angkutan Barang', 'origin' => 'Milik Perusahaan', 'is_active' => 1, 'image' => 'l300.jpg', 'created_at' => '2022-09-02 10:42:58', 'updated_at' => '2022-09-02 10:42:58')
        );

        User::insert([
            [
                'id' => 'ADM001',
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 1,
                'position' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'USR001',
                'name' => 'John Doe',
                'username' => 'johndoe01!',
                'password' => Hash::make('123123123'),
                'role' => 2,
                'position' => 'Kepala Bagian',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'USR002',
                'name' => 'Taylor Otwell',
                'username' => 'taylor99!',
                'password' => Hash::make('123123123'),
                'role' => 3,
                'position' => 'Pengelola Kendaraan',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        Vehicle::insert($vehicles);

        Pool::insert([
            [
                'nama_pool' => 'Pool 1'
            ],
            [
                'nama_pool' => 'Pool 2'
            ],
            [
                'nama_pool' => 'Pool 3'
            ],
            [
                'nama_pool' => 'Pool 4'
            ],
            [
                'nama_pool' => 'Pool 5'
            ],
        ]);
    }
}
