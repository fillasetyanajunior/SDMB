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
        <form action="/accessuser/{{$accessuser->id}}" method="POST">
            @method('patch')
            @csrf
            <div class="form-group col my-3">
                <label for="title">Menu ID</label>
                <input type="text" class="form-control " id="title" name="title" value="{{$accessuser->title}}">
            </div>
            <div class="form-group col my-3">
                <label for="sub_id">Sub ID</label>
                <input type="text" class="form-control " id="sub_id" name="sub_id" value="{{$accessuser->sub_id}}">
            </div>
            <div class="col my-3">
                <button type="submit" class="btn btn-success ">Update</button>
            </div>
        </form>
    </div>
</div>
<!-- /page content -->
@endsection