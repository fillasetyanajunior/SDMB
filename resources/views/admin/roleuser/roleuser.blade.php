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
                @php
                    $users = DB::table('role_users')
                                ->join('users', 'role_users.user_id', 'users.id')
                                ->select('role_users.*', 'users.name')
                                ->orderBy('users.name','asc')
                                ->get();
                    $i=1;
                @endphp
                @foreach ($users as $item)     
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item->name}}</td>
                    @php
                        $id = $item->id;
                        $roles = DB::table('role_users')
                                    ->join('roles', 'role_users.role_id', 'roles.id')
                                    ->where('role_users.user_id', $id)
                                    ->get();
                    @endphp
                    @foreach ($roles as $items)
                        <td>{{$items->name}}</td>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    <td><a href="/roleuser/edit/{{$item->id}}" class="btn btn-warning">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /page content -->
@endsection