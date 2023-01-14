<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Learning;

class LearningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where([['role', '=', 0]])->get();
        $all_teachers = User::where([['role', '=', 1]])->get();
        $all_lessons = Lesson::all();
        echo 'UC='.$users->count()."\n";
        $learnings = [];
        foreach ($users as $user) {
            $count_learnings = rand(1, 20);
            echo 'RLC='.$count_learnings."\n";
            $lessons = $all_lessons->random($count_learnings);
            echo 'LC='.$lessons->count()."\n";
            foreach ($lessons as $lesson) {
                $teacher = $all_teachers->random();
                $learning = new Learning;
                $learning->fill([
                    'lesson_id' => $lesson->id,
                    'student_id' => $user->id,
                    'grade' => rand(1, 100),
                    'teacher_id' => $teacher->id
                ]);
                $learnings[] = $learning;
            }
        }
        $c_learnings = collect($learnings);
        DB::transaction (function () use ($c_learnings) {
            $c_learnings->each(function ($c_learning) { $c_learning->save(); });
        });
    }
}
