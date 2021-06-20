@extends('layouts.app')

@section('content')
<ul>
	@foreach($quizzes as $quiz)
		<li>{{ $quiz->question }}</li>
	@endforeach
</ul>
@endsection