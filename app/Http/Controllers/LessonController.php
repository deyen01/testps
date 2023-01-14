<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lessons = [];
        $sbl = FALSE;
        $sortByLearnings = $request->input('sortByLearnings');
        if ($sortByLearnings == 1) {
            $sbl = TRUE;
            // SQL запрос, в результате которого будет выведен список уроков, отсортированный по количеству студентов его посмотревших
            $sql = 'SELECT *, (SELECT COUNT(*) FROM `learnings` WHERE `lessons`.`id` = `learnings`.`lesson_id`) AS `CountLearnings` from `lessons` ORDER BY `CountLearnings` DESC;';
            // однако в рамках Laravel мы немножко иначе сделаем запрос выше
            $lessons = Lesson::selectRaw('*, (SELECT COUNT(*) FROM `learnings` WHERE `lessons`.`id` = `learnings`.`lesson_id`) AS `CountLearnings`')->OrderByDesc('CountLearnings')->paginate(20)->through(function ($lesson) {
                return [
                    'id' => $lesson->id,
                    'title' => $lesson->title,
                    'CountLearnings' => $lesson->CountLearnings
                ];
            });
        } else {
            $lessons = Lesson::paginate(20)->through(function ($lesson) {
                return [
                    'id' => $lesson->id,
                    'title' => $lesson->title,
                    'cv' => $lesson->cv
                ];
            });
        }
        return Inertia::render('Lessons', ['title' => 'Список уроков', 'lessons' => $lessons->appends(request()->except('page')), 'sbl' => $sbl]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
