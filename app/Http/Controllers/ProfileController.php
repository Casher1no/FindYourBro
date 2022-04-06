<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_picture' => 'required|mimes:jpg,png,jpeg|max:102400',
        ]);

        $image = $request->file('profile_picture');
        $input['image_name'] = time() . '-' . $user['name'] . '.' . $image->extension();
        $input['image_resized_name'] = time() . '-resized-' . $user['name'] . '.' . $image->extension();

        $filePath = public_path('/images/resized');
        $img = Image::make($image->path());
        $img->resize(200, 200, function ($const) {
            $const->aspectRatio();
        })->save($filePath . '/' . $input['image_resized_name']);

        $user['image_path'] = $input['image_name'];

        $filePath = public_path('/images');
        $image->move($filePath, $input['image_name']);


        $user['image_path_resized'] = $input['image_resized_name'];
        $user->save();

        return redirect('/');
    }

    public function updateName(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'user_name'=> 'required'
        ]);

        $user['name'] = $request['user_name'];
        $user->save();

        return redirect(route("editProfile"));
    }

}
