@extends('layouts.app')

@section('content')
    <div>
        <!--TODO Switch section, swipe left/right -->
    </div>
    @if(!$verified)
        <div class="container h-100">
            <div class="row align-items-center" style="height: 600px">
                <div class="col-12 mx-auto">
                    <div class="jumbotron">
                        <h3 class="text-center w-100">Add information about your self in <a
                                href="{{ route('editProfile') }}">Edit Profile</a> section to
                            Find Your Bro</h3>
                    </div>
                </div>
            </div>
        </div>
    @else

    @endif


@endsection
