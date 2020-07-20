@extends('layouts.user_layout')

@section('content')
<div class="container">
	<div class="search-courses">
		<h3><?php echo count($courses);?> Courses match your request</h3>
		<div class="row">
			<div class="col-sm-8">
			@foreach($courses as $course)
				<div class="course">
					<div class="row">
					<div class="col-sm-4">
						<div class="course-image">
							@if($course->photo)
							<a href="/courses/{{$course->slug}}"><img class="course-img" src="/images/{{ $course->photo->filename }}"></a>
							@else
							<a href="/courses/{{$course->slug}}"><img class="course-img" src="/images/default.jpg"></a>
							@endif
						</div>
					</div>
					<div class="col-sm-8">
						<div class="course-info">
							<h5><a href="/courses/{{$course->slug}}">{{ \Str::limit($course->title, 30) }}</a></h5>
							<p>{{ \Str::limit($course->description, 100) }}</p>
							<h6>Track : &nbsp;&nbsp;&nbsp;
								<a href="tracks/{{ $course->track->name }}">{{$course->track->name}}</a>
								<span style="float: right;">
									@if($course->status == 0)
									<span class="free-badge">FREE</span>
									@else
									<span class="paid-badge">PAID</span>
									@endif
									<span>{{ count($course->users) }}</span>
									<span> users enrolled</span>
								</span>
							</h6>
						</div>
					</div>
					</div>		
				</div>
			@endforeach
			</div>
			<div class="col-sm">
				
			</div>
		</div>
	</div>
	
</div>
@endsection