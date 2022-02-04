<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/sections.css') }}">
    </head>
    <div class="kurls"><a href="/" class="aurls">Home</a> / {{ $categoryName }}</div>
    <div class="main-block">  
        <div class="main-block sections">     
            <ul>
            @foreach ($sections as $section)
                <li>
                    <a href="{{ route('section',  [strtolower($categoryName), strtolower($section->name)]) }}" onclick="window.localStorage.clear();"> 
                        <button  class="section">
                            <div class="">
                                <?php 
                                    $postsCount=0;
                                    foreach ($posts as $post){
                                        if($post->section_id == $section->id){
                                            $postsCount+=1;
                                        }
                                    }
                                ?>
                                <p class="sec-button">{{ $section->name }} ( {{ $postsCount }} )</p> 
                            </div>
                        </button>
                    </a>
                    
                </li>            
            @endforeach
            <?php if ($sections->isEmpty()){
               echo "There are no sections here, yet!";
             }?>
            
            </ul>
        </div>
    </div>
</x-app-layout>