<?php

use Illuminate\Database\Seeder;
use App\Answer;

class UsersQuestionsAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function($user)
        {
            $user->questions()
            ->saveMany(
                factory(App\Question::class, rand(1, 7))->make()
            )->each(function ($question){
                $question->answers()->saveMany(
                    factory(Answer::class, rand(1,5))->make());
            });
        });
    }
}
