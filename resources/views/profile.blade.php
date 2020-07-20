@extends('layouts.user_layout')

@section('content')
	<div class="container">
		<div class="user-profile">
			@if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                   	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
			<h3>Profile : {{$user->name}}</h3>
			<div class="row">
				<div class="col-sm-4">
					<div class="user-info">
						<div class="user-image">
							<p id="message"></p>
							<div id="uploaded_image">
								@if($user->photo)
								<img class="img-fluid" src="/images/{{$user->photo->filename}}">
								@else
								<img class="img-fluid" src="/images/default.jpg">
								@endif
							</div>


							


							<a class="upload_btn btn-primary" href="#" 
							 id="upload_btn" ><i class="fas fa-cloud-upload-alt"></i> UPLOAD</a>

							


							<form method="POST" action="/profile" enctype="multipart/form-data">
								@csrf
								<input id="image_file" type="file" name="image">
							</form>
						</div>
						<div class="user-data">
							<ul class="list-unstyled">
								<li>Name : {{$user->name}}</li><hr>
								<li>Email : {{$user->email}}</li><hr>
								<li>Score : {{$user->score}} Points</li><hr>
								<li>Person Type : <i class="fas fa-user-shield" style="color: #1c5996;"></i> {{$user->admin == 1 ? 'Admin' : 'User'}}</li><hr>
								<li class="{{$user->email_verified_at ? 'text-success' : 'text-danger'}}">Verifition : {{$user->email_verified_at ? 'Verified' : 'Unverified'}}</li><hr>
								<li>Member At : <span>{{$user->created_at->diffForHumans()}}</span></li><hr>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm">
					<dir class="user-form">
					<h4>User Info</h4><hr>
						<form method="POST" action="/profile">
							@csrf
							<div class="form-group">
								<label for="email">Your Email</label>
								<input placeholder="Email" type="email" name="email" class="form-control" value="{{$user->email}}">
							</div>
							<div class="form-group">
								<label for="name">Your Name</label>
								<input placeholder="User Name" type="text" name="name" class="form-control" value="{{$user->name}}">
							</div>
							<div class="form-group">
								<label for="password">Your Password</label>
								<input placeholder="Password" type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label for="confirmpassword">Your Confirm Password</label>
								<input placeholder="Confirm Password" type="password" name="confirmpassword" class="form-control">
							</div>
							<input style="width: 100px;" type="submit" name="save" value="Save" class="btn btn-primary">
						</form>
					</dir>
				</div>
			</div>
			<div class="user-tracks">
				<div class="heading">
					<h4>You`re learning in these tracks</h4><hr>
				</div>
				<div class="famous-tracks">
				<div class="tracks">
					<ul class="list-unstyled">
						@foreach($tracks as $track)
						<li><a class="btn btn-default track-name" href="/tracks/{{ $track->name }}">{{ $track->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			</div>
		</div>
	</div>

 <script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">



    function  clickme() {
       	$("#image_file").click(); 

    }



</script>
@endsection