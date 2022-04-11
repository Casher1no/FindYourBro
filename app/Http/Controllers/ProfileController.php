<?php

namespace App\Http\Controllers;

use App\Models\UserGallery;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    // Edit User profile
    public function edit()
    {
        $user = Auth::user();
        $userInfo = UserInfo::where('user_id', $user['id'])->first();

        return view('edit', [
            'user' => $user,
            'userInfo' => $userInfo,
        ]);
    }

    //Uploads two images(full size and resized) and saves path in database
    public function updatePicture(Request $request)
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

        return redirect(route('editProfile'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $userInfo = UserInfo::where('user_id', $user['id'])->first();
        $request->validate([
            'user_name' => 'required',
            'user_surname' => 'required',
            'user_age' => 'required',
            'user_location' => 'required',
            'myRadio' => 'required',
        ]);

        $user['name'] = $request['user_name'];
        $user->save();

        if ($userInfo != null) {
            $userInfo['name'] = $request['user_name'];
            $userInfo['surname'] = $request['user_surname'];
            $userInfo['gender'] = $request['myRadio'];
            $userInfo['location'] = $request['user_location'];
            $userInfo['age'] = $request['user_age'];

            $userInfo->save();
        } else {
            UserInfo::insert([
                'user_id' => $user['id'],
                'name' => $request['user_name'],
                'surname' => $request['user_surname'],
                'gender' => $request['myRadio'],
                'location' => $request['user_location'],
                'age' => $request['user_age'],
            ]);
        }

        return redirect(route("editProfile"));
    }

    public function gallery()
    {
        $gallery = UserGallery::where('user_id', Auth::id())->get();
        return view('gallery', [
            'gallery' => $gallery,
        ]);
    }

    public function addToGallery(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:102400',
        ]);

        $image = $request->file('image');
        $input['image'] = time() . '-gallery-' . $user['name'] . '.' . $image->extension();

        $filePath = public_path('/images/gallery');
        $image->move($filePath, $input['image']);

        UserGallery::insert([
            'user_id' => $user['id'],
            'image_path' => $input['image'],
        ]);

        return redirect(route('gallery'));
    }


}
