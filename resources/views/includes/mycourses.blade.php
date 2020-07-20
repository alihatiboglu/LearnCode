<!--Carousel Wrapper-->
<div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  
    <a class="btn-floating btn-primary left-arrow" href="#carousel-with-lb" data-slide="prev"><i
        class="fas fa-chevron-left" style="color: #ffff"></i></a>
    <a class="btn-floating btn-primary right-arrow" href="#carousel-with-lb" data-slide="next"><i
        class="fas fa-chevron-right" ></i></a>
  
  <!--/.Controls-->

  <!--Indicators
  <ol class="carousel-indicators">
    <li data-target="#carousel-with-lb" data-slide-to="0" class="active secondary-color"></li>
    <li data-target="#carousel-with-lb" data-slide-to="1" class="secondary-color"></li>
    <li data-target="#carousel-with-lb" data-slide-to="2" class="secondary-color"></li>
  </ol>
.Indicators-->

  <!--Slides and lightbox-->

  <div class="course carousel-inner mdb-lightbox" role="listbox">
    <div id="mdb-lightbox-ui"></div>
    <!--First slide-->

      <div id="courses_header">
        <h3>Resume Learning</h3>
        <a href="/mycourses">My Courses</a>
        <div class="clearfix"></div>
      </div>
    @foreach($user_courses as $course)
    <div class=" carousel-item <?php if($loop->first) echo 'active'; ?> ">
      <div class="row">
        <div class="col-sm-4 offset-sm-2">
          <figure class="col-md-4 d-md-inline-block">
            <a href="/courses/{{$course->slug}}"
              data-size="1600x1067">
              @if($course->photo)
              <img src="/images/{{ $course->photo->filename }}" >
              @else
              <img src="/images/default.jpg" >
              @endif
            </a>
          </figure>
        </div>
        <div class="col-sm-4">
          <h3><a href="/courses/{{$course->slug}}">{{ Str::limit($course->title, 30) }}</a></h3><br>
          <h4>Track : <a href="/tracks/{{$course->track->name}}"> {{ $course->track->name }}</a></h4>
          <h5><a href="#">{{ count($course->users) }} User are learning this course.</a></h5>
        </div>
      </div>
      

    </div>
    <!--/.First slide-->
    @endforeach

  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->