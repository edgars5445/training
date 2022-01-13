<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    </head>
    <div class="main-block">
        <div class="main-block categories">    
            We made it this far!
            
            <ul>
            @foreach ($sections as $section)
                <li>
                    {{-- <a href="{{ route('category', [$category->name]) }}"> --}}
                        <button  class="category">
                            <div class="">
                                <p class="cat-button">{{ $section->name }}</p> 
                            </div>
                        </button>
                    {{-- </a>    --}}
                </li>            
            @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>