<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            'Introduction to Computer Science',
            'Data Structures and Algorithms',
            'Database Systems',
            'Web Development',
            'Software Engineering',
            'Operating Systems',
            'Networks and Security',
            'Mobile Application Development',
            'Artificial Intelligence',
            'Cloud Computing',
        ];

        $professors = \App\Models\Professor::all();
        $usedProfessors = [];
        foreach ($courses as $courseName) {
            // Assign a unique professor to each course if available
            $professor = $professors->whereNotIn('id', $usedProfessors)->random(null);
            $usedProfessors[] = $professor->id;
            \App\Models\Course::create([
                'name' => $courseName,
                'description' => $courseName . ' course description',
                'professor_id' => $professor->id,
            ]);
        }
    }
}
