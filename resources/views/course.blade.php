@extends('layouts.user_layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
			<div class="course-header">
				<div class="row">
					<div class="col-sm-8">
						<h2>{{ $course->title }}</h2>
						<p>{{ $course->description }}</p>
						<h5>Track : 
							<a href="tracks/{{ $course->track->name }}">{{$course->track->name}}</a>
							<span style="float: right;">
								@if($course->status == 0)
								<span class="free-badge">FREE</span>
								@else
								<span class="paid-badge">PAID</span>
								@endif
								<span>{{ count($course->users) }}</span>
								<span style="margin-right: 100px;"> users enrolled</span>
							</span>
						</h5>
					</div>
					<div class="col-sm">
						@if($course->photo)
							<img class="course-image" src="/images/{{$course->photo->filename}}">
						@else
							<img class="course-image" src="/images/default.jpg">	
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="enroll-form">
			@if(count(auth()->user()->courses()->where('slug',$course->slug)->get()) > 0)
			<div class="alert alert-success">Already Enrolled</div>
			@else
			<form method="POST" action="/courses/{{$course->slug}}">
				@csrf
				<input type="submit" value="Enroll" name="enroll" class="btn btn-default btn-enroll">
			</form>
			@endif
		</div>
		<div class="clearfix"></div>
		<div class="videos">
			<h3>Course Videos</h3>
			<div class="row">
				<div class="col-sm-12">
					@if(count($course->videos) > 0)
						@if(count(auth()->user()->courses()->where('slug',$course->slug)->get()) > 0)
						@foreach($course->videos as $video)
							<div class="video">
								<a target="_blank" href="{{ $video->link }}"><i class="fab fa-youtube"></i> {{ $video->title }}</a>
							</div>
						@endforeach
						@else
						@foreach($course->videos as $video)
							<div class="video disabled">
								<a target="_blank" href="{{ $video->link }}"><i class="fab fa-youtube"></i> {{ $video->title }}</a>
							</div>
						@endforeach
						@endif
					@else
						<div style="margin-top: 20px; margin-left: 20px;" class="alert alert-secondary">
							Oops!! This course dose not any videos
						</div>
					@endif
				</div>
			</div>
		</div>

		<div class="quizzes">
			<h3>Course Quizzes</h3>
			<div class="row">
				<div class="col-sm-12">
					@if(count($course->quizzes) > 0)
					@if(count(auth()->user()->courses()->where('slug',$course->slug)->get()) > 0)
						@foreach($course->quizzes as $quiz)
							<div class="quiz">
								<a target="_blank" href="/courses/{{ $quiz->course->slug }}/quizzes/{{ $quiz->name }}">{{ $quiz->name }}</a>
							</div>
						@endforeach
					@else
						@foreach($course->quizzes as $quiz)
							<div class="quiz disabled">
								<a target="_blank" href="/courses/{{ $quiz->course->slug }}/quizzes/{{ $quiz->name }}">{{ $quiz->name }}</a>
							</div>
						@endforeach
					@endif

					@else
						<div style="margin-top: 20px; margin-left: 20px;" class="alert alert-secondary">
							Oops!! This course dose not any quizzes
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection