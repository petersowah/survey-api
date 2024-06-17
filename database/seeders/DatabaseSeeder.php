<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::count() === 0){
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password'
            ]);
        }

        if (QuestionType::count() === 0){
            $questionTypes = [
                [
                    'name' => 'Text',
                ],
                [
                    'name' => 'Single Choice',
                ],
                [
                    'name' => 'Multiple Choice',
                ],
                [
                    'name' => 'Image',
                ]
            ];

            $questionTypes = collect($questionTypes)->each(fn($questionType) => QuestionType::create($questionType));
        }
    }
}
