@extends('layouts.dashboard')

@section('title',$title)

@section('content')
@if (request()->user()->hasRole('admin'))
<x-slideadmin></x-slideadmin>
@else
<x-slideuser></x-slideuser>
@endif
<!-- page content -->
<div class="right_col" role="main">
    <div class="container my-3 card">
        <h2 class="col my-3">{{$title}}</h2>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container-sm">
        <img src="{{asset('profile/' . $user->avatar)}}" class="rounded mx-auto d-block" width="200px">
        <form method="post" action="/profile/{{$user->id}}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}} ">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{$user->username}} ">
            </div>
            <div class="form-group">
                <label for="avatar">Upload Profile</label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</div>
<!-- /page content -->
@endsection