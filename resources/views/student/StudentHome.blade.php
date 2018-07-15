@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Logged in as Student</div>

                <div class="card-body">
                    <h1>Hello Student!</h1>
                    @foreach($loggedIn as $user)
                        <p>
                            {{$user->id}} <br>
                            {{$user->firstname}} {{$user->middlename}} {{$user->lastname}} <br>
                            {{$user->birthdate}} <br>
                            {{$user->gender}} <br>
                            {{$user->username}} <br>
                            {{$user->email}} <br>
                            {{$user->type}} <br>
                            {{$user->strand}} <br>
                            {{$user->section}}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
