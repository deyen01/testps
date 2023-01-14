<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learnings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id') // какой урок
                ->nullable()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('student_id') // какой пользователь прошёл обучение этому уроку
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->unique(['lesson_id','student_id']); // только уникальные просмотры
            $table->unsignedTinyInteger('grade')->default(1); // оценка за урок (от 1 до 100)
            $table->foreignId('teacher_id') // какой пользователь поставил оценку
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learnings');
    }
}
