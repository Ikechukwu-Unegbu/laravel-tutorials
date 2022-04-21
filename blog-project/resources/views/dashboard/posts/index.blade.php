@extends('layouts.dashboard')

@section('head')
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('css\dashboard\index.css')}}">
<style>
  .btn{
    width: 8rem !important;
  }
  .btn-holder{
    display: flex;
    justify-content: space-between !important;
  }
  img{
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
    <form style="display: flex;" action="{{route('search.post.byAdmin')}}" method="POST" class="col-10 mt-3">
      @csrf 
      <input type="text" name="search_term" class="col-6 form-control">
      <button class="btn col-3">Search</button>
    </form>
    <div class="dashboard-blog_holder">
      <!-- card begins -->
      @foreach($posts as $p)
      <div class="card  mt-4 mb-5" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-12">
          <img class="img-fluid" src="{{asset('BlogPhotos/'.$p->img_url)}}" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$p->title}}</h5>
              <p class="card-text">{!!$p->body!!}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              <div class="col-12 btn-holder">
                <button href="" class="btn btn-primary btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
                <button class="btn btn-info btn-sm">Publish</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- card ends -->
    </div>
  </div>
</div>
@endsection