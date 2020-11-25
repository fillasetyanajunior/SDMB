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
                <th scope="col">Username</th>
                <th scope="col">Password</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=1;?>
                @foreach ($user as $user)    
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{Crypt::decryptString($user->password1)}}</td>
                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /page content -->
@endsection