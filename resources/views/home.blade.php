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
                <li>
                    <div class="category">
                        <img src="{{ $category->image }}" alt="" class="cat-image">
                        <button  class="cat-button">{{ $category->name }}</button>
                    </div>
                </li>      
                {{-- </form> --}}
            @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>