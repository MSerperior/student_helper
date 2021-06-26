@extends('layouts.app')


@section('page-header')
	Make Question
@endsection

@section('content')

@if(session('success'))
	{{ session('success') }}
@endif

<div class="card border-bottom-primary">
	<div class="card-body">
		<form method="POST" action="{{ route('quiz.store') }}">
			@csrf
			<div class="form-group row">
        <label for="question" class="col-md-2 col-form-label text-md-left">{{ __('Question') }}</label>
        <div class="col-md-10">
            <Textarea id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" required></Textarea>
            @error('question')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    	</div>

    	<div class="form-group row">
        <label for="ans_A" class="col-md-2 col-form-label text-md-left">{{ __('Answer A') }}</label>
        <div class="col-md-10">
            <input id="ans_A" type="text" class="form-control @error('ans_A') is-invalid @enderror" name="ans_A" required></input>
            @error('ans_A')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    	</div>

    	<div class="form-group row">
        <label for="ans_B" class="col-md-2 col-form-label text-md-left">{{ __('Answer B') }}</label>
        <div class="col-md-10">
            <input id="ans_B" type="text" class="form-control @error('ans_B') is-invalid @enderror" name="ans_B" required></input>
            @error('ans_B')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    	</div>

    	<div class="form-group row">
        <label for="ans_C" class="col-md-2 col-form-label text-md-left">{{ __('Answer C') }}</label>
        <div class="col-md-10">
            <input id="ans_C" type="text" class="form-control @error('ans_C') is-invalid @enderror" name="ans_C" required></input>
            @error('ans_C')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    	</div>

    	<div class="form-group row">
        <label for="ans_D" class="col-md-2 col-form-label text-md-left">{{ __('Answer D') }}</label>
        <div class="col-md-10">
            <input id="ans_D" type="text" class="form-control @error('ans_D') is-invalid @enderror" name="ans_D" required></input>
            @error('ans_D')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    	</div>

    	<div class="form-group row">
        <label for="ans_E" class="col-md-2 col-form-label text-md-left">{{ __('Answer E') }}</label>
        <div class="col-md-10">
            <input id="ans_E" type="text" class="form-control @error('ans_E') is-invalid @enderror" name="ans_E" required></input>
            @error('ans_E')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    	</div>

    	<div class="form-group row">
        <label for="correct_ans" class="col-md-2 col-form-label text-md-left">{{ __('Correct Answer') }}</label>
        <div class="col-md-10">
            <select id="correct_ans" class="form-control @error('correct_ans') is-invalid @enderror" name="correct_ans" required>
            	<option value="a">a</option>
            	<option value="b">b</option>
            	<option value="c">c</option>
            	<option value="d">d</option>
            	<option value="e">e</option>
            </select>
            @error('correct_ans')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    	</div>

    	<div class="form-group row mb-0">
          <div class="col-md-2 offset-md-2">
              <button type="submit" class="btn btn-primary">
                  {{ __('Add Question') }}
              </button>
          </div>
      </div>
		</form>
	</div>
</div>
@endsection