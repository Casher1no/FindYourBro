<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\UserDislike;
use App\Models\UserInfo;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //verification
        $verified = false;
        $filters = false;
        $userFound = false;

        $user = Auth::user();
        $userInfo = UserInfo::where('user_id', $user['id'])->first();
        if ($userInfo != null) $verified = true;

        $likedUsers = UserLike::where('user_id', $user['id'])->get();
        $usersLikes = [];
        foreach ($likedUsers as $likedUser) {
            $usersLikes[] = $likedUser['liked_user_id'];
        }

        $dislikedUsers = UserDislike::where('user_id', $user['id'])->get();
        $usersDislikes = [];
        foreach ($dislikedUsers as $dislikedUser) {
            $usersDislikes[] = $dislikedUser['disliked_user_id'];
        }


        if ($userInfo['filter_age'] != null || $userInfo['filter_gender'] != null) {
            $filters = true;
        }

        $randomUser = UserInfo::inRandomOrder()
            ->whereNotIn('user_id', [...$usersDislikes, ...$usersLikes, $user['id']])
            ->where('age', $userInfo['filter_age'])
            ->where('gender', $userInfo['filter_gender'])
            ->first();

        if ($randomUser != null) {
            $randomUserInfo = User::where("id", $randomUser['user_id'])->first();
            $randomUser['gender'] == 'Male' ? $backgroundShadowColor = '110, 245, 255' : $backgroundShadowColor = '250, 107, 255';
            $userFound = true;
        }


        // TODO when there is no bros to find, show title: No bros at the moment. (Bool)

        return view('home', [
            'verified' => $verified,
            'filters' => $filters,
            'search' => $userFound,
            'swipe' => $randomUserInfo ?? '',
            'swipeInfo' => $randomUser,
            'cardColor' => $backgroundShadowColor ?? "",
        ]);
    }


}
