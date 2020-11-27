@extends('layouts.app')

@section('title','Register')

@section('content')
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-body">
                <h2 class="title">Registration </h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Name" name="name">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Username" name="username">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="p-t-10">
                        <button class="btn btn--pill btn--green" type="submit">Singup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
