<?php

namespace Database\Seeders;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::factory(100)->create();
        Subject::create([
            'title' => 'desain web',
            'semester' => 'semester 3',
            'academic_year'=>'2022',
            'sks'=>'8',
            'description'=>'matapelajaran yang membahsas tentang web',
        ]);
    }
}
