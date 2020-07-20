<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a style="font-size: 30px; font-family: 'Loto'; color: #1c5996;" class="navbar-brand" href="{{ route('home') }}"><span style="background-color: #1c5996; color: #fff; padding: 8px; border-radius: 10px 20px; font-size: 30px;" class="logo">LC</span> LearnCode</a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <a class="navbar-brand" href="/home"><span class="logo">LC</span> Learncode</a>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @if(strtolower(auth()->user()->email) == 'kabkhalid19@gmail.com')
                <li class="nav-item">
                    <a class="nav-link " href="#navbar-examples_1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-user-secret" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Admin') }}</span>
                    </a>

                    <div class="collapse " id="navbar-examples_1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.create') }}">
                                    <i class="fas fa-user-tie" style="color: #AB04A9;"></i>{{ __('New Admin') }}
                                </a>
                            </li>  <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user-tie" style="color: #AB04A9;"></i>{{ __('Admin profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.index') }}">
                            <i class="fas fa-user-cog" style="color: #AB04A9;"></i>{{ __('Admin Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link " href="#navbar-examples_12" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-users" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('User') }}</span>
                    </a>

                    <div class="collapse " id="navbar-examples_12">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.create') }}">
                                    <i class="fas fa-user-tie" style="color: #AB04A9;"></i>{{ __('New User') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="fas fa-user-cog" style="color: #AB04A9;"></i>{{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                    <li class="nav-item">
                        <a class="nav-link" href="/admin/tracks">
                            <i class="fa fa-code" style="color: #1E7FE5;"></i> {{ __('Tracks') }}
                         </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/courses">
                            <i class="fas fa-laptop-code" style="color: #1E7FE5;"></i> {{ __('Courses') }}
                         </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/videos">
                            <i class="fab fa-youtube" style="color: #1E7FE5;"></i> {{ __('Videos') }}
                         </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/quizzes">
                            <i class="fas fa-edit text" style="color: #1E7FE5;"></i> {{ __('Quizzes') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/questions">
                            <i class="fa fa-question-circle" style="color: #1E7FE5;"></i> {{ __('Questions') }}
                        </a>
                    </li>
 
          
   <!--  

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-key-25 text-info"></i> {{ __('Login') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}
                    </a>
                </li> -->
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <!-- <h6 class="navbar-heading text-muted">Documentation</h6> -->
            <!-- Navigation -->
            <!-- <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul> -->
        </div>
    </div>
</nav>