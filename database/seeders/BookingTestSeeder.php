<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingTestSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 4, 'ferstname' => 'Hamza', 'lastname' => 'El Fassi', 'role_id' => 2, 'telephone' => '0600111122', 'email' => 'barbero@test.com', 'password' => bcrypt('1234')],
            ['id' => 5, 'ferstname' => 'Omar', 'lastname' => 'Benali', 'role_id' => 3, 'telephone' => '0600222233', 'email' => 'client9@test.com', 'password' => bcrypt('1234')],
            ['id' => 6, 'ferstname' => 'Yassine', 'lastname' => 'Alaoui', 'role_id' => 3, 'telephone' => '0600333344', 'email' => 'cliento@test.com', 'password' => bcrypt('1234')],
        ]);

        DB::table('categories')->insert([
            ['id' => 4, 'name' => 'Haircut'],
            ['id' => 5, 'name' => 'Beard'],
            ['id' => 6, 'name' => 'Hair & Beard'],
        ]);

        DB::table('barbers')->insert([
            ['id' => 4, 'user_id' => 4],
        ]);

        DB::table('services')->insert([
            [
                'id' => 4,
                'image_url' => 'haircut.jpg',
                'titre' => 'Modern Haircut',
                'description' => 'Clean fade haircut',
                'duration' => 30,
                'prix' => 60,
                'barber_id' => 4,
                'category_id' => 4,
            ],
            [
                'id' => 5,
                'image_url' => 'beard.jpg',
                'titre' => 'Beard Trim',
                'description' => 'Professional beard shaping',
                'duration' => 20,
                'prix' => 40,
                'barber_id' => 4,
                'category_id' => 5,
            ],
        ]);

        DB::table('timeslots')->insert([
            ['id' => 4, 'barber_id' => 4, 'day' => 'Monday', 'start_time' => '09:00', 'end_time' => '09:30'],
            ['id' => 5, 'barber_id' => 4, 'day' => 'Monday', 'start_time' => '09:30', 'end_time' => '10:00'],
            ['id' => 6, 'barber_id' => 4, 'day' => 'Monday', 'start_time' => '10:00', 'end_time' => '10:30'],
            ['id' => 7, 'barber_id' => 4, 'day' => 'Monday', 'start_time' => '10:30', 'end_time' => '11:00'],
            ['id' => 8, 'barber_id' => 4, 'day' => 'Tuesday', 'start_time' => '09:00', 'end_time' => '09:30'],
            ['id' => 9, 'barber_id' => 4, 'day' => 'Tuesday', 'start_time' => '09:30', 'end_time' => '10:00'],
        ]);

        DB::table('bookings')->insert([
            [
                'id' => 4,
                'user_id' => 5,
                'barber_id' => 4,
                'service_id' => 4,
                'time_slot_id' => 4,
                'status' => 'confirmed'
            ],
            [
                'id' => 5,
                'user_id' => 6,
                'barber_id' => 4,
                'service_id' => 5,
                'time_slot_id' => 6,
                'status' => 'confirmed'
            ],
            [
                'id' => 6,
                'user_id' => 5,
                'barber_id' => 4,
                'service_id' => 4,
                'time_slot_id' => 8,
                'status' => 'canceled'
            ],
        ]);
    }
}