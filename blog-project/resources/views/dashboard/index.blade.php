@extends('layouts.dashboard')

@section('head')
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('css\dashboard\index.css')}}">
@endsection

@section('content')
<div class="container-dash">
  @include('dashboard\partials\_dashboard_nav')
  <div class="container-right">

  </div>
</div>
@endsection 