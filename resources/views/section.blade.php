<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/sections.css') }}">
        <script src="{{ asset("js/section.js") }}" defer></script>
    </head>
    <div class="main-block">
        <div class="main-block sections">    
            <ul>
            @foreach ($posts as $post)
                <li>
                    {{-- <a href="{{ route('section', ['category'=>$categoryName, 'section'=>$section->name]) }}">  --}}
                        <button  class="section">
                            <div class="post">
                                <div class="div-image"><img src="{{ $post->image }}" alt="" class="post-image"> </div>
                                <div class="div-text">
                                <h2 class="post-title">{{ $post->title }}</h2> 
                                <p class="post-description">{{ $post->description }}</p> 
                                <p class="post-price">Cena: {{ $post->price }}€</p> 
                                </div> 
                                
                            </div>
                            
                        </button>
                        <div class="breakline" name="breakline"></div>
                    {{-- </a> --}}
                </li>            
            @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>