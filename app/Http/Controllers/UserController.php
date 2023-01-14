<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = [];
        $sortByLearnings = $request->input('sortByLearnings');
        $sbl = FALSE;
        if ($sortByLearnings == 1) {
            $sbl = TRUE;
            // SQL запрос, в результате которого будет выведен список студентов, отстортированный по количеству просмотренный уроков.
            $sql = 'SELECT *, (SELECT COUNT(*) FROM `learnings` WHERE `users`.`id` = `learnings`.`student_id`) AS `CountLearnings` from `users` WHERE (`users`.`role` = 0) ORDER BY `CountLearnings` DESC;';
            // однако в рамках Laravel мы немножко иначе сделаем запрос выше
            $users = User::selectRaw('*, (SELECT COUNT(*) FROM `learnings` WHERE `users`.`id` = `learnings`.`student_id`) AS `CountLearnings`')->where([['role','=',0]])->OrderByDesc('CountLearnings')->paginate(20)->through(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'CountLearnings' => $user->CountLearnings
                ];
            });
        } else {
            $users = User::paginate(20)->through(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->vRole
                ];
            });}
        return Inertia::render('Users', ['title' => 'Список пользователей', 'users' => $users->appends(request()->except('page')), 'sbl' => $sbl]);
    }

    public function progress()
    {
        $sql = 'SELECT *, (SELECT SUM(`grade`) FROM `learnings` WHERE `users`.`id` = `learnings`.`student_id`) AS `Rating`, (SELECT COUNT(*) FROM `learnings` WHERE `users`.`id` = `learnings`.`student_id`) AS `Progress`, ROW_NUMBER() OVER(ORDER BY `Rating` DESC) AS `num` from `users` WHERE (`users`.`role` = 0) ORDER BY `Rating` DESC';
        $users = User::selectRaw('*, (SELECT SUM(`grade`) FROM `learnings` WHERE `users`.`id` = `learnings`.`student_id`) AS `Rating`, (SELECT COUNT(*) FROM `learnings` WHERE `users`.`id` = `learnings`.`student_id`) AS `Progress`, ROW_NUMBER() OVER(ORDER BY `Rating` DESC) AS `num`')->where([['role','=',0]])->OrderByDesc('Rating')->paginate(20)->through(function ($user) {
            return [
                'num' => $user->num,
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'Rating' => $user->Rating,
                'Progress' => round(($user->Progress / 27 * 100), 2)
            ];
        });
        return Inertia::render('UsersRating', ['title' => 'Список пользователей', 'users' => $users->appends(request()->except('page'))]);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
