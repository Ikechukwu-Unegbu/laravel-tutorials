@extends('layouts.dashboard')

@section('head')
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('css\dashboard\index.css')}}">
@endsection

@section('content')
<div class="container-dash">
  @include('dashboard\partials\_dashboard_nav')
  <!-- <div class="container-right">

  </div> -->
  <div class="col-8">
    @foreach($comments as $com)
    <div class="card col-12">
      <div class="card-body">
        <div class="">{{$com->comment}}</div>
        <div class="">by: {{$com->user->name}}</div>
        <div class="">under {{$com->post->title}}</div>
      </div>
      <div class="card-footer">
        <span>{{$com->approval_state}}</span>
        @if($com->approval_state == 'approved')
        <a href="{{route('comment.toggle', [$com->id, $com->approval_state])}}" class="btn btn-sm btn-danger">Unapprove</a>
        @else 
        <a href="{{route('comment.toggle', [$com->id, $com->approval_state])}}" class="btn btn-sm btn-primary">Approve</a>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection 