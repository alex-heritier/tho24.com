<?php

namespace Database\Seeders;

use App\Models\Biz;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Alex Heritier',
            'email' => 'alex.heritier@gmail.com',
        ]);
        User::factory()
            ->has(
                Biz::factory()->state([
                    'name' => 'IT Solutions',
                    'descr' => 'A small, artisanal IT shop focused on the TALL stack. We also make Saigon\'s best com tam!',
                    'trade' => 'catering',
                    'main_img' => 'https://upload.wikimedia.org/wikipedia/commons/b/b0/C%C6%A1m_T%E1%BA%A5m%2C_Da_Nang%2C_Vietnam.jpg',
                ])
            )
            ->create([
                'name' => 'Papa John',
                'email' => 'papajohn@sbcglobal.net',
            ]);
    }
}
