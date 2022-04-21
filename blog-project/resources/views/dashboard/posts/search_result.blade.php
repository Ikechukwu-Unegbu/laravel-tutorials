@extends('layouts.dashboard')

@section('head')
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('css\dashboard\index.css')}}">
<style>
  .dashboard-blog_holder{
    width: 100% !important;
  }
  form{
    width: 80%!important;
  }
</style>
@endsection 

@section('content')
<div class="container-dash">
  @include('dashboard\partials\_dashboard_nav')
  <div class="container-right">
    <form style="display: flex;" action="" method="post" class="col-10 mt-3">
      <input type="text" name="search_term" class="col-6 form-control">
      <button class="btn col-3">Search</button>
    </form>
    <div class="dashboard-blog_holder">
      <!-- card begins -->
      @foreach($results as $r)
        <div style="width: 80% !important;" class="card mt-3 col-10">
          <div style="display: flex;" class="card-body">
            <img style="width: 6rem; height:6rem" src="{{asset('BlogPhotos/'.$r->img_url)}}" alt="">
            <a href="{{route('blog.show', [$r->slug])}}"><h3 class="card-title">{{$r->title}}</h3></a>
          </div>
        </div>
      @endforeach
      <!-- card ends -->
    </div>
  </div>
</div>
@endsection