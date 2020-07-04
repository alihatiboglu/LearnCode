@extends('layouts.app', ['title' => __('Video Management')])

@section('content')
    @include('admin.admins.partials.header', ['title' => __('Preview Video')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('video Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('videos.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
					<iframe width="970" height="400" src="{{ $video->link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
					</iframe>                        
                    </div>
                </div>
            </div>
        </div>
            @include('layouts.footers.auth')
    </div>
@endsection
