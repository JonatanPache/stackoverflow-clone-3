<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(15)
            ->has(Question::factory()->count(5)
                ->has(Answer::factory()->count(rand(1,8)),'answers'),'questions')
            ->create();
    }
}
