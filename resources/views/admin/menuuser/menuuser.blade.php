@extends('layouts.dashboard')

@section('title',$title)

@section('content')
<x-slideadmin></x-slideadmin>
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
    <a href="/menuuser/create" class="btn btn-primary my-3">Tambah Data</a>
    <div class="container mt-3">
        <table class="table table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Icon</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=1;?>
                @foreach ($menuuser as $menuuser)    
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$menuuser->title}}</td>
                    <td>{{$menuuser->icon}}</td>
                    <td>
                        <a href="/menuuser/edit/{{$menuuser->id}}" class="btn btn-warning">Edit</a>
                        <form action="/menuuser/{{$menuuser->id}}" method="post" class="d-inline">
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
</div>
<!-- /page content -->
@endsection