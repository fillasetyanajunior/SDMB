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
    <form method="POST" action="/postsejarah" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{old('judul')}} ">
        </div>
        <div class="form-group">
            <label for="sejarah">Sejarah</label>
            <textarea class="form-control" name="sejarah" id="sejarah" rows="10">{{old('sejarah')}}</textarea>
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