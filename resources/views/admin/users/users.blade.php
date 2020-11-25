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
    <div class="container mt-3">
        <table class="table table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Active</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=1;?>
                @foreach ($users as $users)    
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$users->name}}</td>
                    <td>
                    @if ($users->is_active == 1)
                        Active
                    @else
                        Belum Active
                    @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <form action="/users/{{$users->id}}" method="post">
                                @method('patch')
                                @csrf
                                <button type="submit" class="btn btn-success">Active</button>
                            </form>
                            <form action="/users/belum/{{$users->id}}" method="post">
                                @method('patch')
                                @csrf
                                <button type="submit" class="btn btn-warning">Non Aktive</button>
                            </form>
                            <form action="/users/{{$users->id}}" method="post" >
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
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