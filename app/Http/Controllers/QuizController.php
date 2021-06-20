<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all()->where('user_id', '=', Auth::user()->id);
        return view('quiz.index', ['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Validator::make($request, [
            'question' => ['required', 'string', 'max:255'],
            'ans_A' => ['required', 'string', 'max:255'],
            'ans_B' => ['required', 'string', 'max:255'],
            'ans_C' => ['required', 'string', 'max:255'],
            'ans_D' => ['required', 'string', 'max:255'],
            'ans_E' => ['required', 'string', 'max:255'],
            'correct_ans' => ['required', 'string', 'max:255', 'in:a,b,c,d,e'],
        ]);

        $quiz = new Quiz();
        $quiz->question = $request->question;
        $quiz->ans_A = $request->ans_A;
        $quiz->ans_B = $request->ans_B;
        $quiz->ans_C = $request->ans_C;
        $quiz->ans_D = $request->ans_D;
        $quiz->ans_E = $request->ans_E;
        $quiz->correct_ans = $request->correct_ans;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
