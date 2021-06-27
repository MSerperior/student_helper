@extends('layouts.app')


@section('page-header')
Evaluation Result
@endsection

@section('content')
@if ($message = Session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ $message }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@elseif( $message = Session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	{{ $message }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
<div class="card border-left-primary" style="margin-top: 10px">
	<div class="card-body">
		<p>Total Questions : {{ $questionCount }}</p>
		<p>Total Correct Answers : {{ $points }}</p>
		<p>Score : {{ $score }} %</p>
	</div>
</div>
@foreach(Auth::user()->quizzes as $quiz)
<div class="card border-left-primary" style="margin-top: 10px">
	<div class="card-body">
		
		<p>{{ $loop->iteration }}. {{ $quiz->question }} <?php 
			if(!isset($answers['answer_'.$quiz->id]))
			{
				echo "<i class='fas fa-times'></i>";
			}
			elseif ($quiz->correct_ans != $answers["question_{$quiz->id}"]) 
			{
				echo "<i class='fas fa-times'></i>";
			}
			else
			{
				echo "<i class='fas fa-check'></i>";
			}
		 ?></p>
		<input type="radio"  name="question_{{ $quiz->id }}" value="a" disabled=""> {{ $quiz->ans_A }} @if($quiz->correct_ans == 'a')<i class="fas fa-check"></i>@endif</input>
		<br>
		<input type="radio"  name="question_{{ $quiz->id }}" value="b" disabled=""> {{ $quiz->ans_B }} @if($quiz->correct_ans == 'b')<i class="fas fa-check"></i>@endif</input>
		<br>
		<input type="radio"  name="question_{{ $quiz->id }}" value="c" disabled=""> {{ $quiz->ans_C }} @if($quiz->correct_ans == 'c')<i class="fas fa-check"></i>@endif</input>
		<br>
		<input type="radio"  name="question_{{ $quiz->id }}" value="d" disabled=""> {{ $quiz->ans_D }} @if($quiz->correct_ans == 'd')<i class="fas fa-check"></i>@endif</input>
		<br>
		<input type="radio"  name="question_{{ $quiz->id }}" value="e" disabled=""> {{ $quiz->ans_E }} @if($quiz->correct_ans == 'e')<i class="fas fa-check"></i>@endif</input>
	</div>
</div>
@endforeach
@endsection