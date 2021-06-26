@extends('layouts.app')


@section('page-header')
	Train
@endsection

@section('content')

<form method="POST" action="">
	@foreach($quizzes as $quiz)
		<div class="card border-left-primary" style="margin-top: 10px">
			<div class="card-body">
				<p>{{ $loop->iteration }}. {{ $quiz->question }}</p>
				<input type="radio"  name="question-{{ $quiz->id }}"> {{ $quiz->ans_A }}</input>
				<br>
				<input type="radio"  name="question-{{ $quiz->id }}"> {{ $quiz->ans_B }}</input>
				<br>
				<input type="radio"  name="question-{{ $quiz->id }}"> {{ $quiz->ans_C }}</input>
				<br>
				<input type="radio"  name="question-{{ $quiz->id }}"> {{ $quiz->ans_D }}</input>
				<br>
				<input type="radio"  name="question-{{ $quiz->id }}"> {{ $quiz->ans_E }}</input>
			</div>
		</div>
	@endforeach
	<br>
	<div>
		<button class="btn btn-primary col-2 offset-10" type="submit">Submit</button>
	</div>
</form>

@endsection