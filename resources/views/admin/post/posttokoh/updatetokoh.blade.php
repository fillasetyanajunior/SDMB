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
    <form method="POST" action="/posttokoh/{{$posttokoh->id}} " enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$posttokoh->nama}}">
        </div>
        <div class="form-group">
            <label for="caption">Deskripsi</label>
            <textarea name="caption" id="caption" rows="10" class="form-control">{{$posttokoh->caption}}</textarea>
        </div>
        <div class="form-group ">
            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
            <small >Ukuran File Maksimal 7mb dan Ukuran Squere</small>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
<!-- /page content -->
@endsection