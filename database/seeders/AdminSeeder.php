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
                    'main_img' => 'file:///' . storage_path('app/images/biz_pfp/2yb9sR0R8pp1qI4yyBz931XN0wg6e3W2mkbchNr4.jpg'),
                ])
            )
            ->create([
                'name' => 'Papa John',
                'email' => 'papajohn@sbcglobal.net',
            ]);
    }
}
