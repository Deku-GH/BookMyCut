<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingTestSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Client'],
            ['id' => 3, 'name' => 'Barber'],
        ]);

        DB::table('users')->insert([
            [
                'id' => 1,
                'ferstname' => 'Hamza',
                'lastname' => 'El Fassi',
                'role_id' => 2,
                'telephone' => '0600111122',
                'email' => 'barbero@test.com',
                'password' => bcrypt('1234'),
                'photo' => 'default.png',
            ],
            [
                'id' => 2,
                'ferstname' => 'Omar',
                'lastname' => 'Benali',
                'role_id' => 3,
                'telephone' => '0600222233',
                'email' => 'client9@test.com',
                'password' => bcrypt('1234'),
                'photo' => 'default.png',
            ],
            [
                'id' => 3,
                'ferstname' => 'Yassine',
                'lastname' => 'Alaoui',
                'role_id' => 3,
                'telephone' => '0600333344',
                'email' => 'cliento@test.com',
                'password' => bcrypt('1234'),
                'photo' => 'default.png',
            ],
        ]);

        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Haircut'],
            ['id' => 2, 'name' => 'Beard'],
            ['id' => 3, 'name' => 'Hair & Beard'],
        ]);

        DB::table('barbers')->insert([
            [
                'id' => 1,
                'user_id' => 1
            ],
        ]);

        DB::table('services')->insert([
            [
                'id' => 1,
                'image_url' => 'haircut.jpg',
                'titre' => 'Modern Haircut',
                'description' => 'Clean fade haircut',
                'duration' => 30,
                'prix' => 60,
                'barber_id' => 1,
                'category_id' => 1,
            ],
            [
                'id' => 2,
                'image_url' => 'beard.jpg',
                'titre' => 'Beard Trim',
                'description' => 'Professional beard shaping',
                'duration' => 20,
                'prix' => 40,
                'barber_id' => 1,
                'category_id' => 2,
            ],
        ]);

        DB::table('timeslots')->insert([
            [
                'id' => 1,
                'barber_id' => 1,
                'date' => '2026-04-24',
                'start_time' => '09:00:00',
            ],
            [
                'id' => 2,
                'barber_id' => 1,
                'date' => '2026-04-24',
                'start_time' => '09:30:00',
            ],
            [
                'id' => 3,
                'barber_id' => 1,
                'date' => '2026-04-24',
                'start_time' => '10:00:00',
            ],
            [
                'id' => 4,
                'barber_id' => 1,
                'date' => '2026-04-25',
                'start_time' => '10:30:00',
            ],
        ]);

        DB::table('bookings')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'barber_id' => 1,
                'service_id' => 1,
                'time_slot_id' => 1,
                'status' => 'confirmed',
            ],
            [
                'id' => 2,
                'user_id' => 3,
                'barber_id' => 1,
                'service_id' => 2,
                'time_slot_id' => 3,
                'status' => 'confirmed',
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'barber_id' => 1,
                'service_id' => 1,
                'time_slot_id' => 4,
                'status' => 'canceled',
            ],
        ]);
    }
}