<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $learnings = Learning::paginate(20)->through(function ($learning) {
            return [
                'id' => $learning->id,
                'lesson' => [
                    'id' => $learning->lesson->id,
                    'title' => $learning->lesson->title
                ],
                'student' => [
                    'id' => $learning->student->id,
                    'name' => $learning->student->name
                ],
                'grade' => $learning->grade,
                'teacher' => [
                    'id' => $learning->teacher->id,
                    'name' => $learning->teacher->name
                ]
            ];
        });
        return Inertia::render('Learnings', ['title' => 'Обучение (пройденные занятия)', 'learnings' => $learnings]);
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
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function show(Learning $learning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function edit(Learning $learning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Learning $learning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Learning $learning)
    {
        //
    }
}
