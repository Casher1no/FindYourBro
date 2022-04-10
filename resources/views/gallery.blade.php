@extends('layouts.app')

@section('content')
    <div>
        <div class="col text-center">
            <form method="POST" action="{{ route("addToGallery") }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-1 pt-4 ">
                    <input class="form-control w-50 m-auto" type="file" id="formFile" name="image">
                </div>
                <button type="submit" class="btn btn-primary w-50 m-auto" id="btn-submit">Upload Image To Gallery
                </button>
            </form>
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
                            <a href="{{ route('deleteFromGallery',['id'=>$image['id']]) }}" class="btn btn-primary w-25 m-auto"
                               id="btn-submit">Delete</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
@endsection
