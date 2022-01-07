<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    </head>
    <div class="main-block">
        <div class="main-block categories">    
            <ul>
            @foreach ($categories as $category)
                {{-- <form method="POST" action="{{ action([App\Http\Controllers\HomeController::class, 'show']) }}"> --}}
                    <li><button class="category">{{ $category->name }}</button></li>      
                {{-- </form> --}}
            @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>