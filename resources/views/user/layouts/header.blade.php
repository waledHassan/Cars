
        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="i{{url('/')}}">
                                <img src="assets/images/black-logo.png" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="i{{url('/')}}">
                            <img src="assets/images/white-logo.png" class="white-logo" alt="image">
                            <img src="assets/images/black-logo.png" class="black-logo" alt="image">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="i{{url('/')}}" class="nav-link active">
                                       {{ __('Home') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        {{ __('Cars')}} 
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($origins as $origin)                                            
                                        <li class="nav-item">
                                            <a href="{{url('carsOrigin', $origin->slug)}}" class="nav-link">
                                                {{$origin->{'name_'.app()->getLocale()} }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('carsShow_details')}}" class="nav-link">
                                        {{ __('Cars Show') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        {{ __('Categories') }}
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            @foreach ($categories as $category)
                                                <a href="{{url('categories_list', $category_slug=$category->slug)}}" class="nav-link">
                                                    {{$category->{'name_'.app()->getLocale()} }}
                                                </a>
                                            @endforeach
                                        </li>
                                  
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('pricing')}}" class="nav-link">
                                            {{ __('Pricing') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('contact_us')}}" class="nav-link">
                                            {{ __('Contact us') }}
                                    </a>
                                </li>
                            </ul>

                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <div class="languages-list">

                                        @include('partials/language_switcher')

                                    </div>
                                </div>

                                <div class="option-item">
                                    <a href="{{url('/add_ad_page')}}" class="navbar-btn">
                                        {{ __('Add')}}
                                        <i class='bx bx-bell-plus'></i>
                                    </a>
                                </div>
                                
                                <div class="option-item">
                                    <div class="dropdown-account">
                                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class='flaticon-user'></i>
                                            <span>
                                                <p style='color:gold'>{{ __('Account')}} </a>
                                            </span>
                                        </button>
    
                                        <div class="dropdown-menu">

                                            @if (Route::has('login'))
                                            @auth
                                               
                                            <a href="{{url('my_ads')}}" class="dropdown-item">
                                                <span>{{ __('My Ads')}}</span>
                                            </a>    
                                            <a href="{{url('add_ad_page')}}" class="dropdown-item">
                                                <span>Add AD</span>
                                            </a>    
                                            <a href="{{url('favorite_page')}}" class="dropdown-item">
                                                <span>{{ __('Favorite')}}</span>
                                            </a>
                                              <a href="#" class="dropdown-item">
                                                <div style="margin:-10px 0 0 10px;font-size:14px;" :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                                                    <!-- Responsive Settings Options -->
                                                            <!-- Account Management -->
                                                            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                                                {{ __('Settings') }}
                                                            </x-responsive-nav-link>
                                                </div>
                                            </a>
                                                
                                            @else
                                                

                                            <a href="{{url('/login')}}" class="dropdown-item">
                                                <span>{{ __('Login')}}</span>
                                            </a>
                                            @if (Route::has('register'))
                                            <a href="{{url('/register')}}" class="dropdown-item">
                                                <span>{{ __('Sign up')}} </span>
                                            </a>
                                            @endif
                                                                                                                                        
                                            @endauth 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <div class="dropdown-account">
                                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class='flaticon-user'></i>
                                            <span>Mohamed Albrolosy</span>
                                        </button>
                                        <div class="dropdown-menu">

                                    @if (Auth::id())
                                    @auth
                                        

                                    <a href="my-ads.php" class="dropdown-item">
                                        <span>My Ads</span>
                                    </a>
                                    <a href="favorites.php" class="dropdown-item">
                                        <span>Favorite</span>
                                    </a>
                                    <a href="account-details.php" class="dropdown-item">
                                        <span>Settings</span>
                                    </a>
                                    <a href="{{url('logout')}}" class="dropdown-item">
                                        <span>Logout</span>
                                    </a>

                                    @else
                                    <a href="login.php" class="dropdown-item">
                                        <span>Login</span>
                                    </a>
                                    <a href="register.php" class="dropdown-item">
                                        <span>Sign up</span>
                                    </a>
                                    @endauth
                                    @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="option-item">
                                    <a href="add-ads.php" class="navbar-btn">
                                        Add 
                                        <i class='bx bx-bell-plus'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->


