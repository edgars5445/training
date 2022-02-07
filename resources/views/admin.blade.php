<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    </head>
    <div class="main-block">
        <div class="reports-block">
            @foreach($reports as $report)
                <div class="report">
                    @php
                        $reportText = str_replace('_', ' ', $report->report);
                    @endphp
                    <h3>Ticket nr. {{ $report->id }}</h3> 
                    <p>{{ $reportText }}</p>
                    <p>User ID:{{ $report->user_id }}</p>
                    <p>Post ID:{{ $report->post_id }}</p>
                </div>
            @endforeach
        </div>
        
        <div class="posts-block">
            @foreach($posts as $post)
                @foreach ($reports as $report)
                    @if($post->id == $report->post_id)
                    @php
                        $reportText = str_replace('_', ' ', $report->report);
                    @endphp
                        <div class="post post{{ $post->id }}">
                            <p>{{ $post->title }}</p>
                            <p>{{ $post->description }}</p>
                            <div class="post-report">
                                <p>{{ $reportText }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</x-app-layout>