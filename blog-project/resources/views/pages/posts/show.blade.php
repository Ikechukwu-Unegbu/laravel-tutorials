@extends('layouts.public')

@section('head')
<link rel="stylesheet" href="{{asset('css\pages\posts\show.css')}}">
@endsection
@section('content')
<div class="container">
<h3 class="mt-4">{{$post->title}}</h3>
<img class="mt-4" src="{{asset('BlogPhotos/'.$post->img_url)}}" alt="">
<div class="further_details mt-4">
 <span>{{$post->created_at}}</span>
</div>

<div class="mt-4">
  {!!$post->body!!}
</div>
<div class="mt-4">
  <form action="/comment" method="post">
    @csrf
    <div class="form-group">
      <h4 class="mt-3 mb-3">Leave a Comment</h4>
      @include('partials._message')
      <textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary mb-5" style="float: right;">Comment</button>
  </form>
</div>
</div>
@endsection