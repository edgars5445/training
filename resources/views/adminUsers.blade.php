<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <script src="{{ asset("js/admin.js") }}" defer></script>
    </head>
    <div class="main-block">
        <div class= "button-shortucs">
            <x-nav-link :href="route('admin.tickets')" :active="request()->routeIs('admin.tickets')" class="text-decoration-none">
                {{ __('Tickets') }}
            </x-nav-link>

            <x-nav-link :href="route('admin.users')" :active="request()->routeIs('admin.users')" class="text-decoration-none">
                {{ __('Users') }}
            </x-nav-link>
        </div>
        <div class="reports-block">
            @foreach ($users as $user)
                <div class="user">
                    <h3>{{ $user->name }}</h3>
                    <p>ID: {{ $user->id }}</p>
                    <img src="{{ $user->image }}" alt="">
                </div>
            @endforeach
        </div>
        <div class="posts-block">
            
        </div>
    </div>
</x-app-layout>