@extends('layouts.dashboard')

@section('title',$title)

@section('content')
<x-slideadmin></x-slideadmin>
<!-- page content -->
<div class="right_col" role="main">
    <div class="container my-3 card">
        <h2 class="col my-3">{{$title}}</h2>
    </div>
    <div class="container card " >
        <form action="/roleuser/{{$roleuser->id}}" method="POST">
            @method('patch')
            @csrf
            <div class="form-group col my-3">
                <label for="user_id">User ID</label>
                <input type="text" class="form-control " id="user_id" name="user_id" value="{{$roleuser->user_id}}">
            </div>
            <div class="form-group col my-3">
                <label for="role_id">Role ID</label>
                <input type="text" class="form-control " id="role_id" name="role_id" value="{{$roleuser->role_id}}">
            </div>
            <div class="col my-3">
                <button type="submit" class="btn btn-success ">Update</button>
            </div>
        </form>
    </div>
</div>
<!-- /page content -->
@endsection