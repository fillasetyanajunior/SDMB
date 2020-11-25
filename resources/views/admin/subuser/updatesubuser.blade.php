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
        <form action="/subuser/{{$subuser->id}}" method="POST">
            @method('patch')
            @csrf
            <div class="form-group col my-3">
                <label for="title">Nama Menu</label>
                <input type="text" class="form-control " id="title" name="title" value="{{$subuser->title}}">
            </div>
            <div class="form-group col my-3">
                <label for="url">URL</label>
                <input type="text" class="form-control " id="url" name="url" value="{{$subuser->url}}">
            </div>
            <div class="col my-3">
                <button type="submit" class="btn btn-success ">Update</button>
            </div>
        </form>
    </div>
</div>
<!-- /page content -->
@endsection