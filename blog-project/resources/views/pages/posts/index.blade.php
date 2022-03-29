@extends('layouts.public')

@section('head')
<link rel="stylesheet" href="{{asset('css/pages/home/home.css')}}">
@endsection
@section('content')
<div class="container">


  @foreach($posts as $post)
  <div class="card" style="width: 18rem;">
  <img src="{{asset('BlogPhotos/'.$post->img_url)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{!!$post->title!!}</h5>
    <p class="card-text">{!!$post->body!!}</p>
    <br>
    <br>
    <a href="{{route('posts.show', [$post->slug])}}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  @endforeach

</div>
@endsection