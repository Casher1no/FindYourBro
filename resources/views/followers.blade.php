@extends('layouts.app')

@section('content')

    <div class="w-70 h-25 m-auto pt-5">
        <div class="gallery min-vh-100">
            <div class="container-lg">
                <h1 class="mb-2">You Follow</h1>
                <div class="row gy-4 row-cols-1 row-cols-sm-2 row row-cols-md-3">
                    @foreach($followers as $follower)
                        <div class="col m-2" style="background-color: white;height: 350px; border-radius: 5px;">
                            <h3>Name: {{ $follower['name'] }} {{ $follower['surname'] }}</h3>
                            <h3>Age: {{ $follower['age'] }}</h3>
                            <h3>Location: {{ $follower['location'] }}</h3>
                            <h3>Gender: {{ $follower['gender'] }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
