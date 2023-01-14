<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = Lesson::factory()
            ->count(27)
            ->make();
        DB::transaction (function () use ($lessons) {
            $lessons->each(function ($lesson) { $lesson->save(); });
        });
    }
}
