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
    <a href="/postsaudagar/create" class="btn btn-primary my-3">Tambah Data</a>
    <div class="container mt-3">
        <table class="table table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Caption</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=1;?>
                @foreach ($postsaudagars as $postsaudagar)    
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$postsaudagar->judul}}</td>
                    <td>{{Str::limit($postsaudagar->caption, 300, ' Baca Selanjutnya')}}</td>
                    <td>
                        <a href="/postsaudagar/edit/{{$postsaudagar->id}}" class="btn btn-warning">Edit</a>
                        <form action="/postsaudagar/{{$postsaudagar->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$postsaudagars->links()}}
</div>
<!-- /page content -->
@endsection