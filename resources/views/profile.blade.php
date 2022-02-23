<x-app-layout>
    <head>
        <title>Training page</title>
        <link rel="stylesheet" href="{{ asset('css/sections.css') }}">
    </head>
    <div class="urls"><a href="/" class="aurls">Home</a></div>
    <div class="main-block">  
        <div class="main-block sections">     
            <ul>
            <img src="{{ Auth::user()->image }}" alt="Profile picture">
            <li>{{ Auth::user()->name}}</li>
            <li>{{  Auth::user()->email }}</li>
            <input type="button" value="Submit">
            </ul>
        </div>
    </div>
</x-app-layout>