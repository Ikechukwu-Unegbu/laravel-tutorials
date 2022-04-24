@extends('layouts.public')

@section('head')
<title>Admin|Category</title>
<link rel="stylesheet" href="{{asset('css\dashboard\index.css')}}">
@endsection

@section('content')
<div class="container-dash">
@include('dashboard\partials\_dashboard_nav')


<div class="container-right">
@include('partials._message')
<a href="{{route('category.store')}}" style="float: right;" class="btn mt-4 btn-sm btn-primary">Add New Category</a>
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
</div>
@endsection