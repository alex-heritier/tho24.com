<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Biz;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Biz::factory(20)
            ->for(User::factory())
            ->has(Position::factory(2))
            ->create();

        User::factory()->create([
            'name' => 'Alex Heritier',
            'email' => 'alex.heritier@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Papa John',
            'email' => 'papajohn@sbcglobal.net',
        ]);
    }
}
