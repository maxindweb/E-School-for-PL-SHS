<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionChoice;

class QuestionController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $question = null;

        DB::transaction(function () use ($request, &$question){
            $question = Question::create([
                'question'          => input('question'),
                'quiz_id'           => input('quiz_id'),
                'question_method'   => input('question_method')
            ]);

            // creating choice(multiple answer)

            foreach($request->input('choices') as $detail){
                QuestionChoice::create([
                    'choice' => $detail['choice'],
                    'question_id' => $question->id
                ]);
            }
        });
    }

    public function allTeacher()
    {
        //
    }
}
