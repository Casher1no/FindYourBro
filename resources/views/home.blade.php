@extends('layouts.app')

@section('content')
    @if(!$verified)
        <div class="container h-100">
            <div class="row align-items-center" style="height: 600px">
                <div class="col-12 mx-auto">
                    <div class="jumbotron">
                        <h3 class="text-center w-100">Add information about your self in <a id="link-edit-profile"
                                href="{{ route('editProfile') }}">Edit Profile</a> section to
                            Find Your Bro</h3>
                    </div>
                </div>
            </div>
        </div>
    @else

        <div class="container h-100">
            <div class="row align-items-center m-auto" style="height: 800px; width: 600px;">
                <div class="col-12 mx-auto">
                    <div class="jumbotron">

                        <div class="card m-auto" style="width: 100%;height: 700px;">
                            <img src="{{asset('images/' . $swipe['image_path'])}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $swipeInfo['name'] }} {{ $swipeInfo['surname'] }}</h5>
                                <p class="card-text">Age: {{ $swipeInfo['age'] }}</p>
                                <p class="card-text">Location: {{ $swipeInfo['location'] }}</p>
                                <a href="#" class="btn btn-primary">Multiple buttons | Multiple buttons</a>
                            </div>
                        <!-- TODO Create Multiple buttons like/dislike/follow/gallery -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif


@endsection
