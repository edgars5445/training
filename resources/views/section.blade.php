<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/sections.css') }}">
        <script src="{{ asset("js/section.js") }}" defer></script>
        <script src="{{ asset("js/sectionAjax.js") }}" defer></script>
    </head>
    <div class="filters">
        <div class="urls"><a href="/" class="aurls">Home</a> / <a href="{{ route('category', [strtolower($category)]) }}" class="aurls">{{ $category}}</a> / {{ $section }} </div>
        <form method="GET" action="{{ route("section.search", ["category" => $category, "section" => $section]) }}">
            <label for="priceBy">Cena</label>

            <select name="priceBy" id="priceBy" class="center">
                <option disabled selected value="0"> -- Cena: -- </option>
                <option value="1" id="priceBy1">Sākot ar zemāko</option>
                <option value="2" id="priceBy2">Sākot ar augstāko</option>
            </select><br>

            <input type="text" placeholder="Search by title" name="search" id="searchBox"onkeyup='saveValue(this);'/>
            <div class="breaklineFilter" name="breakline"></div>                  
            <button type="submit" class="filter-button" id="filter_submit">Filter</button>
            <button type="button" class="filter-button" id="reset" onclick="resetButton('{{ $category }}','{{ $section }}')">Reset</button>
        </form>
    </div>
    <div class="main-block">
        <div class="main-block sections">         
            <ul id="ulClass"> 
                <div class="ajaxDiv">
                @foreach ($posts as $post)
                    <li>
                        {{-- <a href="{{ route('section', ['category'=>$categoryName, 'section'=>$section->name]) }}">  --}}
                            @php
                                $path = url()->full();
                                $fullPath = $path . '#' . $post->id;
                            @endphp
                            <input type="hidden" value="{{ $fullPath }}" id = "{{ $fullPath }}">
                            <button class = "copy-button" value="copy" onclick="copyToClipboard('{{ $fullPath }}','{{ $post->title }}')">Copy Link</button>
                            <button  class="section">
                                <div id = "{{ $post->id }}" class="post">                                   
                                    <div class="div-image"><img src="{{ $post->image }}" alt="" class="post-image"> </div>
                                    <div class="div-text">
                                    <h2 class="post-title">{{ $post->title }}</h2> 
                                    <p class="post-description">{{ $post->description }}</p> 
                                    <p class="post-price">Cena: {{ $post->price }}€</p> 
                                    </div> 
                                </div>
                            </button>
                            
                            {{-- Modal launch --}}
                            @auth
                            <button type="submit" class="report-button" data-bs-toggle="modal" data-bs-target="#reportModal{{ $post->id }}" data-userid = "{{ $post->user_id }}" data-postid="{{ $post->id }}" data-reporterId="{{ Auth::user()->id }}">
                                Report
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="reportModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Report "{{ $post->title }}"</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <select name="report_select" id="report_select" class="report_select{{ $post->id }}">
                                            <option disabled selected value>-- Select report --</option>
                                            <option value="Wrong_section">Wrong section</option>
                                            <option value="Spam">Spam</option>
                                            <option value="Offensive_title/description">Offensive title/description</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submit-report{{ $post->id }}" data-bs-dismiss="modal" id="report-button">Report</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endauth
                            
                            <div class="breakline" name="breakline"></div>
                        {{-- </a> --}}
                    </li>            
                @endforeach
                </div>
            </div>
                <?php if ($posts->isEmpty()){
                    echo "There are no posts here, yet!";
                }?>

                
            </ul>
            <div class="d-flex just-content-center links">
                {!! $posts->appends($_GET)->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
</x-app-layout>