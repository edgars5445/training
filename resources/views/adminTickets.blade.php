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
            <?php if ($reports->isEmpty()){
                echo "There are no reports to review!";
            }?>
            @foreach($reports as $report)
                <div class="report reportDiv{{ $report->id }}">
                    <div class="report-info report{{ $report->post_id }}" onclick="openTicket('{{ $report->post_id }}')">
                        @php
                            $reportText = str_replace('_', ' ', $report->report);
                        @endphp
                        <h3>Ticket nr. {{ $report->id }}</h3> 
                        <p>{{ $reportText }}</p>
                        <p>User ID:{{ $report->user_id }}</p>
                        <p>Post ID:{{ $report->post_id }}</p>
                    </div>
                    <div class="report-buttons">
                        <button type="button" name="resolve" data-post-id="{{ $report->post_id }}" data-report-id="{{ $report->id }}" class="report-resolve">Resolve</button>
                        <button type="button" name="dismiss" data-report-id="{{ $report->id }}" data-post-id="{{ $report->post_id }}" class="report-dismiss">Dismiss</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="posts-block">
            @foreach($posts as $post)
                @foreach ($reports as $report)
                    @if($post->id == $report->post_id)
                        <div class="post post{{ $post->id }}" style="display: none;">                           
                            @php
                                $reportText = str_replace('_', ' ', $report->report);
                            @endphp
                            <p>{{ $post->title }}</p>
                            <p>{{ $post->description }}</p>
                            <div class="post-report">
                                <p>{{ $reportText }}</p>
                                <select class="postSection{{ $post->id }}" id="">
                                    @foreach ($sections as $section)
                                        @if ($post->section_id == $section->id)
                                            <option value="{{ $section->id }}" class="" selected>{{ $section->name }}</option>
                                            @php
                                                $categoryID = $section->category_id;
                                            @endphp
                                        @else
                                            <option value="{{ $section->id }}" class="" >{{ $section->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select class="postCategory{{ $post->id }}" id="">
                                    @foreach ($categories as $category)
                                        @if ($category->id == $categoryID)
                                            <option value="{{ $category->id }}" selected class="">{{ $category->name }}</option>
                                        @else 
                                            <option value="{{ $category->id }}" class="">{{ $category->name }}</option>
                                        @endif                                      
                                    @endforeach
                                </select>
                                Delete post: <input type="checkbox" class="deletePost{{ $post->id }}"/>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</x-app-layout>