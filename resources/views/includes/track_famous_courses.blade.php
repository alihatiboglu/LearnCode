<div class="container">
	<div class="famous-courses">
		<?php $i = 0; ?>
		@foreach($tracks as $track)
		<h4>Last {{$track->name}} Courses</h4>
		<div class="row">
			@foreach($track->courses()->limit(4)->get() as $course)
			<div class="col-sm-3">
				<div class="course">
					@if($course->photo)
					<a href="/courses/{{$course->slug}}">
						<img src="/images/{{$course->photo->filename}}">
					</a>
					@else
					<a href="/courses/{{$course->slug}}"><img src="/images/default.jpg"></a>
					@endif
					<h6><a href="/courses/{{$course->slug}}"> {{\Str::limit($course->title, 30)}} </a></h6>
					<span style="margin-left: 20px;" class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
					<span style="float: right; margin-right: 20px;">{{ count($course->users) }} Users</span>
				</div>
			</div>
			@endforeach
			</div>
			@if( $i==1 )
			<div class="famous-tracks">
				<h4>Famous topic for you </h4>
				<div class="tracks">
					<ul class="list-unstyled">
						@foreach($famous_tracks as $famous_track)
						<li><a class="btn btn-default track-name" href="/tracks/{{$track->name}}">{{ $famous_track->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			@if($i == 2)
			@auth
				<div class="recommended-courses">
					<h4>Recommended courses for you </h4>
					<div class="courses">
						@foreach($recommended_courses as $course)
							<div class="course">
								<div class="row">
									<div class="col-sm-2">
										<div class="course-image">
											@if($course->photo)
											<a href="/courses/{{$course->slug}}"><img src="/images/{{$course->photo->filename}}"></a>
											@else
											<a href="/courses/{{$course->slug}}"><img src="/images/default.jpg"></a>
											@endif
										</div>
									</div>
									<div class="col-sm-">
										<div class="course-details">
											<p class="course-title"><a href="/courses/{{$course->slug}}">{{\Str::limit($course->title, 90)}}</a></p>
											
											<span class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
											<span style="margin-left: 250px;">{{ count($course->users) }} Users</span>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			@endauth
			@endif
			<?php $i++; ?>
		@endforeach
	</div>
</div>