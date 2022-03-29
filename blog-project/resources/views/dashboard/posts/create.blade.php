@extends('layouts.public')

@section('head')
<title>Admin|Post</title>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

@endsection


@section('content')
<div class="container">
  <form action="{{route('post.store')}}" method="POST" class="form" enctype="multipart/form-data">
    @csrf 
    <div class="form-group">
      <h3>Create New Post</h3>
    </div>
    @include('partials._message')
    <div class="form-group mt-4">
      <label for="" class="form-label">Post Title</label>
      <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group mt-4">
      <label for="" class="form-label">Post Slug</label>
      <input type="text" name="slug" class="form-control">
    </div>
    <div class="form-group mt-4">
      <label for="" class="form-label">Post Title</label>
      <input type="file" name="post_img" >
    </div>
      <div class="form-group mt-4">
        <label for="" class="form-label">Select Category</label>
        <select class="form-select" name="category" aria-label="Default select example">
        <option selected>Open this select Category</option>
        @foreach($categories as $cat)
          <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
      </div>
    <div class="form-group mt-4">
      <textarea name="body" id="mytextarea" cols="30" class="form-control" rows="10"></textarea>
    </div>
    <div class="form-group mt-3">
      <button class="btn btn-success">Post</button>
    </div>
  </form>
</div>
@endsection
