<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = User::factory()
            ->count(4)
            ->make(['role' => 1]);
        DB::transaction (function () use ($admins) {
            $admins->each(function ($admin) { $admin->save(); });
        });
        $students = User::factory()
            ->count(2000)
            ->make();
        DB::transaction (function () use ($students) {
            $students->each(function ($student) { $student->save(); });
        });
    }
}
