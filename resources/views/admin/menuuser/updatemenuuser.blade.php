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
        <form action="/menuuser/{{$menuuser->id}}" method="POST">
            @method('patch')
            @csrf
            <div class="form-group col my-3">
                <label for="title">Nama Menu</label>
                <input type="text" class="form-control " id="title" name="title" value="{{$menuuser->title}}">
            </div>
            <div class="form-group col my-3">
                <label for="icon">Icon</label>
                <input type="text" class="form-control " id="icon" name="icon" value="{{$menuuser->icon}}">
            </div>
            <div class="col my-3">
                <button type="submit" class="btn btn-success ">Update</button>
            </div>
        </form>
    </div>
</div>
<!-- /page content -->
@endsection