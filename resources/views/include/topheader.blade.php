            <div id="top-header">
                <div class="container">
                    <ul class="header-links pull-left">
                        <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                        <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                    </ul>
                    <ul class="header-links pull-right">
                        <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                        <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                    </ul>
                    @if (Route::has('login'))
                    <ul class="header-links pull-right">
                        @auth
                        <li><a href="#"><i class="fa fa-user-o"></i>Hola </a></li>
                        @else

                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><i class="fa fa-user-o"></i>Log in</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-sm text-gray-700 underline"><i class="fa fa-user-o"></i>Register</a></li>

                        @endif
                    @endauth
                    </ul>
                    @endif
                </div>




            </div>