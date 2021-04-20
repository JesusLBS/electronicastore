













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
                         <li><a href="./"><i class="fa fa-user-o"></i>Inicio</a></li>
                    @if (Route::has('login')) 
                        @auth
                        <li>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="fa fa-power -off"></i>Salir</a>

                           
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>  
                        </li>
                        <!------------------------------------------------------------*----------------------------------------------------------->
                        @if(auth()->user()->id_rol !=2 )
                        <li><a href="{{ route('home') }}">Puedo ir al Sistema :)</a></li>
                        @else
                         <li><a href="#"><i class="fa fa-user-o"></i>Estoy Loguedo en la web Soy un cliente </a></li>
                        @endif
                        <!------------------------------------------------------------*----------------------------------------------------------->
                       
                        @else
                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><i class="fa fa-user-o"></i>Login</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-sm text-gray-700 underline"><i class="fa fa-user-o"></i>Registrarse</a></li>

                        @endif
                    @endauth
                    </ul>
                    @endif
                </div>




            </div>