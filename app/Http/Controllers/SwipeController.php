<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserGallery;
use App\Models\UserInfo;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SwipeController extends Controller
{

    public function followers()
    {
        $users = UserFollow::where('user_id', Auth::id())->get();
        $following = [];
        foreach ($users as $user) {
            $following[] = UserInfo::where('id', $user['followed_user_id'])->first();
        }

        return view('followers', [
            'followers' => $following,
        ]);
    }

    public function gallery(Request $request)
    {
        $id = $request->id;
        $gallery = UserGallery::where('user_id', $id)->get();
        $user = User::where('id', $id)->first();
        $userInfo = UserInfo::where('user_id', $id)->first();
        return view('gallery-view', [
            'gallery' => $gallery,
            'user' => $user,
            'userInfo' => $userInfo,
        ]);
    }

    public function matches()
    {
        $id = Auth::id();
        $userLiked = UserLike::where('user_id', $id)->get();
        $likedUser = UserLike::where('liked_user_id', $id)->get();
        $matches = [];

        foreach ($userLiked as $liked) {
            foreach ($likedUser as $user) {
                if ($liked['liked_user_id'] == $user['user_id']) {
                    $matches[] = $user;
                }
            }
        }
        $match = [];
        foreach($matches as $m){
            $match[] = UserInfo::where('id',$m['user_id'])->first();
        }

        return view('matches',[
            'matches' => $match,
        ]);
    }
}
