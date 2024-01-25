<nav class="bg-secondary border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between px-10 md:px-20 mx-auto p-4">
        <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset('img/logo.png')}}" class="h-8" alt="Balen Logo"/>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @guest
                <a href="{{route('login')}}"
                   class="text-gray-900 bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-bold rounded-lg text-md px-4 py-2 text-center">
                    Login
                </a>
            @else
                <a href="{{route('logout')}}"
                   onclick="event.preventDefault(); document.querySelector('#logout-form').submit()"
                   class="text-gray-900 bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-bold rounded-lg text-md px-4 py-2 text-center">
                    Logout
                </a>
                <form action="{{route('logout')}}" method="post" id="logout-form" class="hidden">@csrf</form>
            @endguest
            <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-secondary md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-secondary">
                <li>
                    <a href="{{route('home')}}"
                       class="block peer py-2 px-3 md:p-0 {{request()->routeIs('home*') ? 'text-gray-900 md:text-white bg-white rounded md:bg-transparent' : 'text-white rounded'}}"
                       aria-current="page">Beranda</a>
                    <hr class="md:peer-hover:block {{request()->routeIs('home*') ? 'text-white hidden md:block' : 'hidden'}}">
                </li>
                <li>
                    <a href="{{route('contact.index')}}"
                       class="block peer py-2 px-3 md:p-0 {{request()->routeIs('contact.index') ? 'text-gray-900 md:text-white bg-white rounded md:bg-transparent' : 'text-white rounded'}}">
                        Hubungi Kami
                    </a>
                    <hr class="md:peer-hover:block {{request()->routeIs('contact.index') ? 'text-white hidden md:block' : 'hidden'}}">
                </li>
                @auth
                    @role('Peminjam')
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                class="flex items-center justify-between w-full py-2 px-3 text-white rounded hover:bg-gray-100 hover:text-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-200 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Layanan
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                             class="z-[99] hidden font-normal bg-[#879EA6] divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 font-bold"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{route('reservations.index')}}"
                                       class="block px-4 py-2 {{request()->routeIs('reservations.*') ? 'text-[#00065C]' : 'text-white'}} hover:text-[#00065C] ease-in-out transition-all duration-150">Peminjaman</a>
                                </li>
                                <li>
                                    <a href="{{route('fine-payment.index')}}"
                                       class="block px-4 py-2 {{request()->routeIs('fine-payment.*') ? 'text-[#00065C]' : 'text-white'}} hover:text-[#00065C] ease-in-out transition-all duration-150">Pembayaran Denda</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{route('collections.index')}}"
                           class="block peer py-2 px-3 md:p-0 {{request()->routeIs('collections.index') ? 'text-gray-900 md:text-white bg-white rounded md:bg-transparent' : 'text-white rounded'}}">
                            Koleksi
                        </a>
                        <hr class="md:peer-hover:block {{request()->routeIs('collections.index') ? 'text-white hidden md:block' : 'hidden'}}">
                    </li>
                    @endrole
                @endauth
            </ul>
        </div>
    </div>
</nav>
