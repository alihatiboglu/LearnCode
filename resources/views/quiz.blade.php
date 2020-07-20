@extends('layouts.user_layout')

@section('content')
	<div class="container">
		<div class="quiz-container">

			<h3>{{ \Str::limit($quiz->course->title, 30) }} : {{ $quiz->name }} Quiz</h3>
					<div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
			<div class="quiz-questions">
					<form method="POST" action="/courses/{{$quiz->course->slug}}/quizzes/{{$quiz->name}}" autocomplete="off">
						@csrf
					@foreach($quiz->questions as $question)
						<div class="form-group">
							<label for="answer">Q: {{ $question->title }} (<span> {{$question->score}}  Points</span> )</label>
							@if($question->type == 'text')
							<input type="text" name="answer{{$question->id}}" class="form-control" placeholder="Your Answer">
							@else
							<?php $answers = explode(',', $question->answers); ?>
							@foreach($answers as $answer)
							<div class="radio">
								<label> <input type="radio" name="answer{{$question->id}}">{{ $answer }}</label>
							</div>
							@endforeach
							@endif
						</div><hr>
					@endforeach
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">
					</form>
			</div>
		</div>
	</div>

@endsection