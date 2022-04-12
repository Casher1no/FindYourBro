@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">

        <div id="update-profile-window">
            <div class="m-5">
                <div>
                    <h1>Profile Settings</h1>
                </div>
                <div>
                    <form method="POST" action="{{ route("updateProfile") }}">
                        @csrf
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   value="{{ $user['name'] ?? "" }}"
                                   name="user_name">
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   value="{{ $userInfo['surname'] ?? "" }}"
                                   name="user_surname">
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Age</label>
                            <input type="number" min="18" max="80" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   value="{{ $userInfo['age'] ?? "" }}"
                                   name="user_age">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Location</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   value="{{ $userInfo['location'] ?? "" }}"
                                   name="user_location">
                        </div>


                        <div class="radio mb-3">
                            <input class="radio__input" type="radio" name="myRadio" id="myRadio1" value="Male" checked>
                            <label class="radio__label" for="myRadio1">Male</label>

                            <input class="radio__input" type="radio" name="myRadio" id="myRadio2" value="Female">
                            <label class="radio__label" for="myRadio2">Female</label>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Update</button>
                    </form>

                    <form method="POST" action="{{ route("updatePicture") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1 pt-4">
                            <label for="formFile" class="form-label">Profile picture</label>
                            <input class="form-control" type="file" id="formFile" name="profile_picture">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Update</button>
                    </form>
                    @if(session()->has('message'))
                        <p style="color: #4fffac">{{ session()->get('message') }}</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
