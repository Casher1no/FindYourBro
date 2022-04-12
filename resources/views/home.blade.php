@extends('layouts.app')

@section('content')
    @if(!$verified)
        <div class="container h-100">
            <div class="row align-items-center" style="height: 600px">
                <div class="col-12 mx-auto">
                    <div class="jumbotron">
                        <h3 class="text-center w-100">Add information about your self in
                            <a id="link-edit-profile" href="{{ route('editProfile') }}">Edit Profile</a> section to Find
                            Your Bro</h3>
                    </div>
                </div>
            </div>
        </div>
    @else

        @if(!$filters)
            <div class="container h-100">
                <div class="row align-items-center" style="height: 600px">
                    <div class="col-12 mx-auto">
                        <div class="jumbotron">
                            <h3 class="text-center w-100">Configure filters in
                                <a id="link-edit-profile" href="{{ route('configuration') }}">Edit Filters</a> section
                                to
                                Find
                                Your Bro</h3>
                        </div>
                    </div>
                </div>
            </div>
        @else

            <div class="container h-100">
                <div class="row align-items-center m-auto" style="height: 800px; width: 600px;">
                    <div class="col-12 mx-auto">
                        <div class="jumbotron">
                            <div class="card m-auto" id="swipe-card"
                                 style="width: 100%;height: 700px; box-shadow: rgba({{ $cardColor }}, 0.4) 0px 30px 90px;">
                                <img src="{{asset('images/' . $swipe['image_path'])}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $swipeInfo['name'] }} {{ $swipeInfo['surname'] }}</h5>
                                    <p class="card-text">Age: {{ $swipeInfo['age'] }}</p>
                                    <p class="card-text">Location: {{ $swipeInfo['location'] }}</p>
                                </div>
                                <div class="w-70 h-25 m-auto pt-5">
                                    <div>
                                        <a class="btn btn-primary" title="Dislike" id="btn-submit"
                                           href="{{route('dislike',['id'=>$swipe['id']])}}" role="button"
                                           style="border-radius: 10px 0px 0px 10px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                 fill="#1A1A1D" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-primary" title="Follow" id="btn-submit" href="#"
                                           role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                 fill="#1A1A1D" class="bi bi-person-plus" viewBox="0 0 16 16">
                                                <path
                                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                <path fill-rule="evenodd"
                                                      d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-primary" title="Gallery" id="btn-submit" href="#"
                                           role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                 fill="#1A1A1D" class="bi bi-images" viewBox="0 0 16 16">
                                                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                                <path
                                                    d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-primary" title="Like" id="btn-submit"
                                           href="{{route('like',['id'=>$swipe['id']])}}" role="button"
                                           style="border-radius: 0px 10px 10px 0px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                 fill="#1A1A1D" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- TODO Create Multiple buttons like/dislike/follow/gallery -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection
