<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = \App\Models\Course::all();
        \App\Models\Student::factory(100)->create()->each(function ($student) use ($courses) {
            // Assign 1 to 3 random courses to each student
            $student->courses()->sync($courses->random(rand(1, min(3, $courses->count())))->pluck('id')->toArray());
        });
    }
}
