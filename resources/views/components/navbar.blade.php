<nav class="bg-[#F15A24] border-gray-200 fixed w-full z-[99] top-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 px-10 md:px-20">
        <a href="{{route('home')}}/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset('img/logo.png')}}" class="h-8" alt="Balen Logo"/>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            @if(auth()->check())
                <a href="{{route('logout')}}"
                   onclick="event.preventDefault(); document.querySelector('#logout').submit()"
                   class="text-gray-900 bg-gray-100 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm uppercase px-8 py-2 text-center">
                    Logout
                </a>
                <form action="{{route('logout')}}" method="post" id="logout">@csrf</form>
            @else
                <a href="{{route('login')}}"
                   class="text-gray-900 bg-gray-100 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm uppercase px-8 py-2 text-center">
                    Login
                </a>
            @endif
            <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-100 rounded-lg md:hidden hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-[#F15A24] md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-[#F15A24]">
                <li>
                    <a href="{{route('home')}}"
                       class="block py-2 px-3 {{request()->routeIs('home') ? 'text-gray-800 bg-gray-100 md:bg-transparent md:text-gray-100' : 'text-gray-100'}} rounded peer hover:bg-gray-100 md:hover:bg-transparent md:p-0"
                       aria-current="page">Beranda</a>
                    <hr class="w-[30px] h-[3px] bg-gray-100 md:peer-hover:block {{request()->routeIs('home') ? 'hidden md:block' : 'hidden'}}">
                </li>
                <li>
                    <a href="{{route('contact')}}"
                       class="block py-2 px-3 {{request()->routeIs('contact') ? 'text-gray-800 bg-gray-100 md:bg-transparent md:text-gray-100' : 'text-gray-100'}} rounded peer hover:bg-gray-100 md:hover:bg-transparent md:p-0">Hubungi
                        Kami</a>
                    <hr class="w-[30px] h-[3px] bg-gray-100 md:peer-hover:block {{request()->routeIs('contact') ? 'hidden md:block' : 'hidden'}}">
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 {{request()->routeIs('service') ? 'text-gray-800 bg-gray-100 md:bg-transparent md:text-gray-100' : 'text-gray-100'}} rounded peer hover:bg-gray-100 md:hover:bg-transparent md:p-0">Layanan</a>
                    <hr class="w-[30px] h-[3px] bg-gray-100 md:peer-hover:block {{request()->routeIs('service') ? 'hidden md:block' : 'hidden'}}">
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 {{request()->routeIs('collection') ? 'text-gray-800 bg-gray-100 md:bg-transparent md:text-gray-100' : 'text-gray-100'}} rounded peer hover:bg-gray-100 md:hover:bg-transparent md:p-0">Koleksi</a>
                    <hr class="w-[30px] h-[3px] bg-gray-100 md:peer-hover:block {{request()->routeIs('collection') ? 'hidden md:block' : 'hidden'}}">
                </li>
            </ul>
        </div>
    </div>
</nav>
