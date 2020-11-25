@extends('layouts.dashboard')

@section('title',$title)

@section('content')
<x-slideadmin></x-slideadmin>
<!-- page content -->
<div class="right_col" role="main">
    <div class="container my-3 card ">
        <h2 class="col my-3">{{$title}}</h2>
    </div>
    <div class="container card">
        <form action="/accessadmin" method="POST">
            @csrf
            <div class="form-group col my-3">
                <label for="menu_id">Menu ID</label>
                <input type="text" class="form-control @error('menu_id') is-invalid @enderror " id="menu_id" name="menu_id" value="{{old('menu_id')}}">
            </div>
            <div class="form-group col my-3">
                <label for="sub_id">Sub ID</label>
                <input type="text" class="form-control @error('sub_id') is-invalid @enderror " id="sub_id" name="sub_id" value="{{old('sub_id')}}">
            </div>
            <div class="col my-3">
                <button type="submit" class="btn btn-success ">Tambah</button>
            </div>
        </form>
    </div>
</div>
<!-- /page content -->
@endsection