<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/sections.css') }}">
    </head>
    <div class="main-block">
        <div class="main-block sections">   
            <ul>
            @foreach ($sections as $section)
                <li>
                    <a href="{{ route('section',  [$categoryName, strtolower($section->name)]) }}"> 
                        <button  class="section">
                            <div class="">
                                <p class="sec-button">{{ $section->name }} ( : number of posts)</p> 
                            </div>
                        </button>
                    </a>
                </li>            
            @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>