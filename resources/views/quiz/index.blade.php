@extends('layouts.app')


@section('page-header')
	Train
@endsection

@section('content')


<form method="POST" action="{{ route('quiz.check', ['quizzes' => $quizzes]) }}">
	@csrf
	@foreach($quizzes as $quiz)
		<div class="card border-left-primary" style="margin-top: 10px">
			<div class="card-body">
				<p>{{ $loop->iteration }}. {{ $quiz->question }}</p>
				<input type="radio"  name="question_{{ $quiz->id }}" value="a"> {{ $quiz->ans_A }}</input>
				<br>
				<input type="radio"  name="question_{{ $quiz->id }}" value="b"> {{ $quiz->ans_B }}</input>
				<br>
				<input type="radio"  name="question_{{ $quiz->id }}" value="c"> {{ $quiz->ans_C }}</input>
				<br>
				<input type="radio"  name="question_{{ $quiz->id }}" value="d"> {{ $quiz->ans_D }}</input>
				<br>
				<input type="radio"  name="question_{{ $quiz->id }}" value="e"> {{ $quiz->ans_E }}</input>
			</div>
		</div>
	@endforeach
	<div>
		<button class="btn btn-primary col-2 offset-10" style="margin-top: 15px" type="submit">Submit</button>
	</div>
</form>

@endsection