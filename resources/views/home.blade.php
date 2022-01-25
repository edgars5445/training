<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
        <script src="{{ asset("js/homepage.js") }}" defer></script>
    </head>
    <div class="main-block">
        <div class="main-block categories">    
            <ul>
            @foreach ($categories as $category)
                <li>
                    @auth
                        @if(Auth::user()->role >=2)
                            <form method="POST" action="{{action([App\Http\Controllers\HomeController::class, 'deleteCategory']) }}">
                                @csrf
                                <input name="cat_id" type="hidden" value="{{ $category->id }}">
                                <button class="admin-button delete-cat">Delete</button>
                            </form>

                            <!-- Button trigger modal -->
                            <button type="button" class="admin-button edit-cat" data-bs-toggle="modal" data-bs-target="#{{ str_replace(' ', '', $category->name) }}">
                                Edit
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="{{ str_replace(' ', '', $category->name) }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit "{{ $category->name }}" category</h5>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <form method="POST" action="{{action([App\Http\Controllers\HomeController::class, 'editCategory']) }}">
                                                @csrf
                                                <input type="text" name="cat_name" id="cat_name" value="{{$category->name}}">
                                                <input type="hidden" name="cat_id" id="cat_id" value="{{$category->id}}">

                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Save changes">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endauth
                    <a href="{{ route('category', [strtolower($category->name)]) }}">
                        <button  class="category">
                            <div class="">
                                <img src="{{ $category->image }}" alt="" class="cat-image">        
                                <p class="cat-button">{{ $category->name }}</p> 
                            </div>
                        </button>
                        <div class="breakline" name="breakline"></div>
                    </a>
                </li>            
            @endforeach            
            </ul>
            
        </div>
    </div>
</x-app-layout>