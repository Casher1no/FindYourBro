@extends('layouts.app')

@section('content')

    <div>
        <div class="col text-center">
            <h2>{{ $userInfo['name'] }}</h2>
            <h2>{{ $userInfo['surname'] }}</h2>
            <h2>Age: {{ $userInfo['age'] }}</h2>
            <img src="{{ asset('images/' . $user['image_path'])}}" class="gallery-item mb-2"
                 alt="gallery" id="gallery-image" style="width: 200px; border-radius: 5px;"><br>
            <a class="btn btn-primary" title="Dislike" id="btn-submit"
               href="{{route('dislike',['id'=>$user['id']])}}" role="button"
               style="border-radius: 10px 0px 0px 10px">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                     fill="#1A1A1D" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path
                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </a>
            <a class="btn btn-primary" title="Like" id="btn-submit"
               href="{{route('like',['id'=>$user['id']])}}" role="button"
               style="border-radius: 0px 10px 10px 0px">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                     fill="#1A1A1D" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="w-70 h-25 m-auto pt-5">
        <div class="gallery min-vh-100">
            <div class="container-lg">
                <div class="row gy-4 row-cols-1 row-cols-sm-2 row row-cols-md-3">
                    @foreach($gallery as $image)
                        <div class="col">
                            <img src="{{ asset('images/gallery/' . $image['image_path'])}}" class="gallery-item"
                                 alt="gallery" id="gallery-image">
                            <a href="{{ route('deleteFromGallery',['id'=>$image['id']]) }}"
                               class="btn btn-primary w-25 m-auto"
                               id="btn-submit">Delete</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
