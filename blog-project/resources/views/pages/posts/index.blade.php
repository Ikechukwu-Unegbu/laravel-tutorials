@extends('layouts.public')

@section('head')
<link rel="stylesheet" href="{{asset('css/pages/home/home.css')}}">
@endsection
@section('content')
@if(Auth::check())
  @if(Auth::user()->access == 'admin')
  <nav class="nav bg-dark">
  <div style="color: white;" class="">
    <a href="/dashboard">Admin Nav</a>
  </div>
</nav>
  @endif
@endif
<div class="container mt-5">

  @foreach($posts as $post)
  <div class="card" style="width: 18rem;">
  <img src="{{asset('BlogPhotos/'.$post->img_url)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <a href="{{route('posts.show', [$post->slug])}}"><h5 class="card-title">{!!$post->title!!}</h5></a>
    <p class="card-text">{!!$post->body!!}</p>
    <br>
    <br>
    <a href="{{route('posts.show', [$post->slug])}}" class="">Red More</a>
  </div>
</div>
  @endforeach

</div>
@endsection