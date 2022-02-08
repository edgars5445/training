<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <script src="{{ asset("js/admin.js") }}" defer></script>
    </head>
    <div class="main-block">
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
                        <button type="button" name="resolve" data-post-id="{{ $report->post_id }}" class="report-resolve">Resolve</button>
                        <button type="button" name="dismiss" data-report-id="{{ $report->id }}" data-post-id="{{ $report->post_id }}" class="report-dismiss">Dismiss</button>
                    </div>
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
                        <div class="post post{{ $post->id }}" style="display: none;">
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