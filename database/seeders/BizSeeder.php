<?php

namespace Database\Seeders;

use App\Models\Biz;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Biz::factory(20)
            ->for(User::factory())
            ->has(Position::factory(2))
            ->create();
    }
}
