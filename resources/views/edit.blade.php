@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">

        <div id="update-profile-window">
            <div class="m-5">
                <div>
                    <h1>Change Profile Picture</h1>
                </div>
                <div>
                    <form method="POST" action="{{ route("updateName") }}">
                        @csrf
                        <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   value="{{ $user['name'] }}"
                                   name="user_name">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Update</button>
                    </form>

                    <form method="POST" action="{{ route("updateProfile") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1 pt-4">
                            <label for="formFile" class="form-label">Profile picture</label>
                            <input class="form-control" type="file" id="formFile" name="profile_picture">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Update</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
