@extends('layouts.public')

@section('head')
<title>Admin|Category</title>
@endsection

@section('content')
<div class="container">
@include('partials._message')
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->description}}</td>
      <td>
        <button class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#category-{{$category->id}}">Edit</button>
        <button class="btn btn-sm btn-danger">Delete</button>
        <button class="btn btn-secondary btn-sm">View</button>
        @include('dashboard.category.partials.modal')
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection