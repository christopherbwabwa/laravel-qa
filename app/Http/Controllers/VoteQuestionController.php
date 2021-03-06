<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class VoteQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function __invoke(Question $question)
    {
        $vote = (int) request()->vote;

      $voteCount = auth()->user()->voteQuestion($question, $vote);

        if(request()->expectsJson()){
            return response([
                'message' => 'Thanks for the feedback',
                'votesCount' => $voteCount
            ]);
        }

        return back();
    }
}
