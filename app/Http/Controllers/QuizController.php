<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
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
        $quiz->user_id = Auth::user()->id;
        $quiz->save();

        return redirect()->back()->with('success', 'data successfully added');

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
        $quiz = Quiz::findOrFail($id);

        if($quiz->user_id != Auth::user()->id)
        {
            return redirect()->back()->with('error', 'Failed to update data');
        }

        $validation = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'ans_A' => ['required', 'string', 'max:255'],
            'ans_B' => ['required', 'string', 'max:255'],
            'ans_C' => ['required', 'string', 'max:255'],
            'ans_D' => ['required', 'string', 'max:255'],
            'ans_E' => ['required', 'string', 'max:255'],
            'correct_ans' => ['required', 'string', 'max:255', 'in:a,b,c,d,e'],
        ]);

        $quiz->question = $request->question;
        $quiz->ans_A = $request->ans_A;
        $quiz->ans_B = $request->ans_B;
        $quiz->ans_C = $request->ans_C;
        $quiz->ans_D = $request->ans_D;
        $quiz->ans_E = $request->ans_E;
        $quiz->correct_ans = $request->correct_ans;
        $quiz->save();

        return redirect()->back()->with('success', 'data successfully added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        if(Auth::user()->id != $quiz->user_id){

            return redirect()->route('quiz.index')->with('error', 'failed to delete data');
        }

        $quiz->delete();
        return redirect()->route('quiz.index')->with('success', 'data deleted successfully');
    }

    public function train()
    {
        return view('quiz.train');
    }

    public function check(Request $request)
    {
        if ($request->header('referer') != route('quiz.train')) {
            return redirect()->back()->with('error', 'inaccessible');
        }

        $answers = $request->all();
        $points = 0;

        $quizzes = Auth::user()->quizzes;

        foreach ($quizzes as $quiz) 
        {
            if(isset($answers["question_{$quiz->id}"]))
            {
                if($quiz->correct_ans === $answers["question_{$quiz->id}"])
                {
                    $answers["answer_{$quiz->id}"] = true;
                    $points += 1;
                }
                else
                {
                    $answers["answer_{$quiz->id}"] = false;
                }
            }
        }
        $questionCount = count($quizzes);
        $score = round($points/$questionCount*100, 2);

        return view('quiz.check', ['score' => $score, 'points' => $points, 'questionCount' => $questionCount, 'answers' => $answers, 'quizzes' => $quizzes]);
    }
}
