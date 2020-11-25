@extends('layouts.dashboard')

@section('title',$title)

@section('content')
<x-slideadmin></x-slideadmin>
<!-- page content -->
<div class="right_col" role="main">
    <div class="container my-3 card ">
        <h2 class="col my-3">{{$title}}</h2>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a href="/menuadmin/create" class="btn btn-primary my-2">Tambah Data</a>
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
                @foreach ($menuadmin as $menuadmin)    
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$menuadmin->title}}</td>
                    <td>{{$menuadmin->icon}}</td>
                    <td>
                        <a href="/menuadmin/edit/{{$menuadmin->id}}" class="btn btn-warning">Edit</a>
                        <form action="/menuadmin/{{$menuadmin->id}}" method="post" class="d-inline">
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