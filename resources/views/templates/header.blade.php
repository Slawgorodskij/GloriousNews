<header class="header">
    <div class="header-icons container">
        <div class="header-icons__item">
            <a class="header-icons__logo logo" href="/">
                <svg viewBox="0 0 48 48" width="48px" height="48px">
                    <path fill="#FF5722" d="M32,15v28H10c-2.2,0-4-1.8-4-4V15H32z"/>
                    <path fill="#FFCCBC" d="M14,5v34c0,2.2-1.8,4-4,4h29c2.2,0,4-1.8,4-4V5H14z"/>
                    <path fill="#FF5722"
                          d="M20 10H38V14H20zM20 17H28V19H20zM30 17H38V19H30zM20 21H28V23H20zM30 21H38V23H30zM20 25H28V27H20zM30 25H38V27H30zM20 29H28V31H20zM30 29H38V31H30zM20 33H28V35H20zM30 33H38V35H30zM20 37H28V39H20zM30 37H38V39H30z"/>
                </svg>
            </a>
            <form action="#" class="header-icons__search-form search-form">
                <input type="text" class="search-form__field search-form__inactive" placeholder="search"/>
                <button class="search-form__btn search">
                    <svg class="svg-icon" viewBox="0 0 27 28" width="26" height="26">
                        <path
                            d="M19.0596 17.6259C20.6713 15.8658 21.6282 13.6048 21.7698 11.2225C21.9113 8.84018 21.2288 6.48173 19.8369 4.54318C18.445 2.60463 16.4285 1.20404 14.126 0.576619C11.8234 -0.0508009 9.3751 0.13316 7.19217 1.09761C5.00923 2.06205 3.22463 3.74825 2.13804 5.87302C1.05145 7.9978 0.729054 10.4318 1.225 12.7661C1.72094 15.1005 3.00501 17.1932 4.86158 18.6927C6.71814 20.1922 9.03413 21.0072 11.4206 21.0009C13.673 21.004 15.8645 20.27 17.6606 18.9109L25.4086 26.7179C25.4941 26.807 25.5965 26.8781 25.7099 26.927C25.8232 26.9759 25.9452 27.0017 26.0686 27.0029C26.1923 27.0033 26.3148 26.9782 26.4283 26.9292C26.5419 26.8801 26.6441 26.8082 26.7286 26.7179C26.9025 26.537 26.9997 26.2958 26.9997 26.0449C26.9997 25.794 26.9025 25.5528 26.7286 25.3719L19.0596 17.6259ZM2.88662 10.5009C2.89946 8.81563 3.41094 7.17187 4.35659 5.77685C5.30224 4.38183 6.63972 3.29801 8.20044 2.662C9.76115 2.02599 11.4752 1.86627 13.1266 2.20298C14.7779 2.53969 16.2926 3.35775 17.4797 4.55404C18.6668 5.75033 19.4732 7.27129 19.7972 8.92519C20.1212 10.5791 19.9483 12.2919 19.3002 13.8476C18.6522 15.4034 17.5581 16.7325 16.1559 17.6674C14.7536 18.6023 13.1059 19.1011 11.4206 19.1009C9.14916 19.0901 6.97482 18.1784 5.37484 16.566C3.77486 14.9537 2.87998 12.7724 2.88662 10.5009Z"/>
                    </svg>
                </button>
            </form>
        </div>
        @if (Auth::user() && Auth::user()->hasRole('admin'))
            <a class="header-link" href="{{route('home_admin')}}">{{__('main/header.admin_page')}}</a>
        @endif
        <div class="header-icons__item">
            <svg class="header-icons__svg-menu svg-icon button-menu" viewBox="0 0 32 23" width="32" height="23">
                <path d="M0 23V20.31H32V23H0ZM0 12.76V10.07H32V12.76H0ZM0 2.69V0H32V2.69H0Z"/>
            </svg>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('main/header.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('main/header.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('main/header.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <a class="header-link"
               href="{{route('locale', __('main/header.set_lang'))}}">{{__('main/header.set_lang')}}</a>
        </div>
    </div>

    <div class="wrapper wrapper__inactive">
        @include('templates.menu')
    </div>
</header>

