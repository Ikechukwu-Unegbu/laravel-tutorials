@extends('layouts.public')

@section('head')
<title>Admin|Category</title>
@endsection

@section('content')
<div class="container">
  <form action="{{route('category.store')}}" method="POST" class="form">
    @csrf 
    <div class="form-group">
      <h3>Category Creation Form</h3>
      @include('partials._message')
    </div>
    <div class="form-group mt-4">
      <label for="" class="form-label">Category Name</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group mt-3">
      <!-- <label for="" class="form-label"></label> -->
      <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group mt-3">
      <button style="float: right !important;" class="btn btn-primary">Create Group</button>
    </div>
  </form>
</div>
@endsection