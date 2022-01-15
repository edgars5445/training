<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    </head>
    <div class="main-block">
        <div class="main-block categories">    
            <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('category', [strtolower($category->name)]) }}">
                        <button  class="category">
                            <div class="">
                                <img src="{{ $category->image }}" alt="" class="cat-image"> 
                                <p class="cat-button">{{ $category->name }}</p> 
                            </div>
                        </button>
                    </a>
                </li>            
            @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>