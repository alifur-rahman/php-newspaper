@extends('Layout.app')
@section('title', 'Error 404')
@section('content')
<div id="notfound">
    <div class="notfound">
        <div class="not_found_img">
            <img src="assets/img/404-img/new.png" alt="">
        </div>
        <div class="notfound-404">
            <h1>Oops!</h1>
            <!-- <h2>Page not found</h2> -->
            <h2>404 - The Page can't be found</h2>
        </div>
    <a href="/">Go TO Homepage</a>
    
    </div>
</div>
@endsection