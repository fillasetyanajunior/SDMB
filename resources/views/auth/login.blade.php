@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h2 class="title">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    <div class="input-group">
                        <input class="input--style-3 @error('username') is-invalid @enderror" type="text" placeholder="Username" name="username" value="{{old('username')}}">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3 @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="p-t-10">
                        <button class="btn btn--pill btn--green" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
