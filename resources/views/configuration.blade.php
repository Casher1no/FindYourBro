@extends('layouts.app')

<script>
    function updateTextInput(val) {
        var value1 = document.getElementById("range").value;
        document.getElementById('value1').innerHTML = "Roll Below:   " + value1;
    }
</script>

@section('content')
    @if($validate)
    <div class="d-flex justify-content-center">
        <div id="update-profile-window">
            <div class="m-5">
                <div>
                    <h1>Edit filters</h1>
                </div>
                <div>
                    <form method="POST" action="{{ route("updateFilters") }}">
                        @csrf
                        <h3>What are you interested in?</h3>
                        <div class="radio mb-3">
                            <input class="radio__input" type="radio" name="myRadio" id="myRadio1" value="Male" checked>
                            <label class="radio__label" for="myRadio1">Male</label>

                            <input class="radio__input" type="radio" name="myRadio" id="myRadio2" value="Female" {{ $checked }}>
                            <label class="radio__label" for="myRadio2">Female</label>
                        </div>
                        <div>

                            <!-- TODO Value should be from user DB -->
                            <input oninput="rangeInput.value=amount.value" id="box" type="text" value="{{ $age }}"
                                   name="amount" for="rangeInput" onkeyup="updateTextInput(this.value);"
                                   oninput="amount.value=rangeInput.value"
                                   READONLY
                                   style="background-color: rgba(0,0,0,0);border: none; width: auto"/><br>
                            <input id="range" type="range" name="rangeInput" min="18" step="1" max="80" value="{{ $age }}"
                                   class="white" onchange="updateTextInput(this.value);"
                                   oninput="amount.value=rangeInput.value" style="width: 300px">

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Update</button>
                    </form>

                </div>
                @if(session()->has('message'))
                    <p style="color: #4fffac">{{ session()->get('message') }}</p>
                @endif
            </div>
        </div>
    </div>
    @else
        <div class="container h-100">
            <div class="row align-items-center" style="height: 600px">
                <div class="col-12 mx-auto">
                    <div class="jumbotron">
                        <h3 class="text-center w-100">Add information about your self in
                            <a id="link-edit-profile" href="{{ route('editProfile') }}">Edit Profile</a> section to Edit filters</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
