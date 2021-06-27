@extends('layouts.app')

@section('page-header')
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
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Quiz List</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="quizTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="col-md-1">No</th>
						<th>Question</th>
						<th class="col-md-3">Details</th>
					</tr>
				</thead>
				<tbody>
					@foreach($quizzes as $quiz)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $quiz->question }}</td>
						<td>
							<button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-placement="top" data-target="#modal-edit-quiz-{{ $quiz->id }}">
								<i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit
							</button>
							<button class="btn btn-icon icon-left btn-danger" data-toggle="modal" data-placement="top" data-target="#modal-delete-quiz-{{ $quiz->id }}">
								<i class="fa fa-trash" aria-hidden="true"></i> Delete
							</button>
						</td>
						<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-quiz-{{ $quiz->id }}">
							<div class="modal-dialog modal-md" role="document" style="min-width: 50%;">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Quiz</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
									</div>
									<div class="modal-body">
										<form class="" method="POST" action="{{ route('quiz.update', ['id' => $quiz->id]) }}">
											@csrf
											<div class=" form-group row">
												<label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>
												<div class="col-md-6">
													<Textarea id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question"  required autofocus>{{ $quiz->question }}</Textarea>
													@error('question')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="ans_A" class="col-md-4 col-form-label text-md-right">{{ __('Answer A') }}</label>
												<div class="col-md-6">
													<input id="ans_A" type="text" class="form-control @error('ans_A') is-invalid @enderror" name="ans_A" value="{{ $quiz->ans_A }}" required autofocus>
													@error('ans_A')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="ans_B" class="col-md-4 col-form-label text-md-right">{{ __('Answer B') }}</label>
												<div class="col-md-6">
													<input id="ans_B" type="text" class="form-control @error('ans_B') is-invalid @enderror" name="ans_B" value="{{ $quiz->ans_B }}" required autofocus>
													@error('ans_B')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="ans_C" class="col-md-4 col-form-label text-md-right">{{ __('Answer C') }}</label>
												<div class="col-md-6">
													<input id="ans_C" type="text" class="form-control @error('ans_C') is-invalid @enderror" name="ans_C" value="{{ $quiz->ans_C }}" required autofocus>
													@error('ans_C')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="ans_D" class="col-md-4 col-form-label text-md-right">{{ __('Answer D') }}</label>
												<div class="col-md-6">
													<input id="ans_D" type="text" class="form-control @error('ans_D') is-invalid @enderror" name="ans_D" value="{{ $quiz->ans_D }}" required autofocus>
													@error('ans_D')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="ans_E" class="col-md-4 col-form-label text-md-right">{{ __('Answer E') }}</label>
												<div class="col-md-6">
													<input id="ans_E" type="text" class="form-control @error('ans_E') is-invalid @enderror" name="ans_E" value="{{ $quiz->ans_E }}" required autofocus>
													@error('ans_E')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
												<label for="correct_ans" class="col-md-4 col-form-label text-md-right">{{ __('Correct Answer') }}</label>
												<div class="col-md-6">
													<select id="correct_ans" class="form-control @error('correct_ans') is-invalid @enderror" name="correct_ans" required autofocus>
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
												<div class="col-md-8 offset-md-4">
													<button type="submit" class="btn btn-primary">
														{{ __('Edit') }}
													</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-quiz-{{ $quiz->id }}">
							<div class="modal-dialog modal-md" role="document" style="min-width: 50%;">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Delete Quiz</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
									</div>
									<div class="modal-body">
										<form class="" method="POST" action="{{ route('quiz.destroy', ['id' => $quiz->id]) }}">
											@csrf
											<div class=" form-group row">
												<label for="question" class="col-md-12 col-form-label">{{ __('Are you sure want to delete this data?') }}</label>
											</div>
											<div class="form-group row mb-0">
												<div class="col-md-2 offset-md-10">
													<button type="submit" class="btn btn-danger">
														{{ __('Delete') }}
													</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('style')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('localJS')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#quizTable').DataTable();
	} );
</script>
@endsection