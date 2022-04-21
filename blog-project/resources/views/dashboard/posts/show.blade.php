@extends('layouts.dashboard')

@section('head')
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('css\dashboard\index.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    width: 60%!important;
  }
  .dashboard-blog_holder{
    overflow-x: hidden !important;
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
      <div class="card">
        <div class="card-body">
            <h1 class="mt-3 mb-3">{{$blog->title}}</h1>
            <div class="">
              <img style="width: 100%;" src="{{asset('BlogPhotos/'.$blog->img_url)}}" alt="">
            </div>
            <div>
              {!!$blog->body!!}
            </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          @foreach($blog->comment as $comment)
            <div class="">
              <button class="btn btn-sm btn-info">
                delete
              </button>
              <p>{{$comment->comment}}</p>
            </div>
            <div class="">
              <small>{{$comment->user->name}}</small>
            </div>
          @endforeach
        </div>
      </div>
      <!-- card ends -->
    </div>
  </div>
</div>
@endsection