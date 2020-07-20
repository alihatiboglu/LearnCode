@extends('layouts.user_layout')

@section('content')
	<div class="container">
		<div class="track-courses">
			<h4>{{$track->name}} Courses</h4>
			<div class="courses">
				<div class="row">
					<?php $i = 0;?>
					@foreach($courses as $course)
					<div class="col-sm-3">
						<div class="course">
							@if($course->photo)
							<a href="/courses/{{$course->slug}}"><img src="/images/{{$course->photo->filename}}"></a>
							@else
							<a href="/courses/{{$course->slug}}"><img src="/images/default.jpg"></a>
							@endif
							<h6><a href="/courses/{{$course->slug}}"> {{\Str::limit($course->title, 30)}} </a></h6>
							<span style="margin-left: 20px;" class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
							<span style="float: right; margin-right: 20px;">{{ count($course->users) }} Users</span>
						</div>
					</div>
					<?php if($i == 3) {}
						echo "<br>";
						$i++;
					?>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection