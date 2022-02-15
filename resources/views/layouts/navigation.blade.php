<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky-top"> 
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex nav-links">
                <!-- Navigation Links -->
                <div class="hidden sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-decoration-none home-button">
                        {{ __('Home') }}
                    </x-nav-link>
                    
                        @guest
                            <x-nav-link href="/login" class="text-decoration-none">
                                <button type="button">
                                    New post
                                </button>
                            </x-nav-link> 
                        @endguest
                        
                        <div class="nav-divider"></div>

                        @auth
                            <!-- Button trigger modal -->
                            <x-nav-link class="text-decoration-none nav-button">
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    New post
                                </button>
                            </x-nav-link>   
                            
                            @if(Auth::user()->role > 1)
                            <x-nav-link class="text-decoration-none nav-button" :href="route('admin.tickets')" :active="request()->routeIs('admin.panel')">
                                {{ __('Admin panel') }}
                            </x-nav-link>  
                            @endif
                        @endauth
                        @php
                        $route = Route::current()->getName();
                        @endphp                 
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            @auth<div>{{ Auth::user()->name }}</div>@endauth
                            @guest<div class="text-dark">Guest</div>@endauth
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            @guest
                            <x-dropdown-link href="/login" class="text-decoration-none">Login</x-dropdown-link>
                            <x-dropdown-link href="/register" class="text-decoration-none">Register</x-dropdown-link>
                            @endguest
                            @auth
                            <x-dropdown-link :href="route('profile.index')">Settings</x-dropdown-link> 
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-decoration-none">
                                {{ __('Log out')}}
                            </x-dropdown-link>
                            @endauth
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Make new post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{action([App\Http\Controllers\HomeController::class, 'newPost']) }}">
                @csrf
                <div class="text-center">
                    <input class="w-75 postTitle" type="text" name="title" placeholder="Title"><br>
                    <textarea class="w-75 postDescription" name="description" id="description" placeholder="Description" style="height: 150px;"></textarea><br>
                    <input class="h-50 w-75 postImage" type="text" name="image" id="image" placeholder="Image link"><br>
                    <input class = "w35 postPrice" type="text" name="price" id="price" placeholder="Price"><br>
                    @auth
                    <input type="hidden" class="userID" value="{{ Auth::user()->id }}" name = "user_id"/>
                    @endauth
                    <select class = "w35 categorySelect" name="select_id" id="category_select" >
                        <option disabled selected value> -- Select category -- </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select><br>
                        
                    @php
                        $r = $_SERVER['REQUEST_URI']; 
                        $r = explode('/', $r);
                        $r = array_filter($r);
                        $r = array_merge($r, array()); 
                        $endofurl = ucfirst(str_replace('%20',' ',end($r)));
                    @endphp
                    <select class = "w35 postSelect" name="section_select" id="section_select" onchange="checkCategory(this)">
                        <option disabled selected value=0> -- Select section -- </option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}" name="{{ $section->category_id }}" >{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>    
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="hidden" value="{{ $route }}" id="routeName">

            <button type="button" class="btn btn-primary" id="post-button" data-bs-dismiss="modal">Post</button>

            {{-- data-bs-toggle="modal" data-bs-target="#staticBackdrop2"  --button post attributes, which are needed to move on to next modal --}}
            {{-- Also, a fix needs to be made in after posting -> returns back to the same page -> aftewards with ajax  --}}
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- Modal 2  -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Pay for the publication</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form method="POST" action="{{action([App\Http\Controllers\HomeController::class, 'editCategory']) }}">
                    @csrf --}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Back</button>
            <button type="button" class="btn btn-primary">Post</button>
                {{-- </form> --}}
            </div>
        </div>
        </div>
</div>
