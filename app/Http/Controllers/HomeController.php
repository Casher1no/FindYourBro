<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\UserInfo;
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
        $verified = false;

        $user = Auth::user();
        $userInfo = UserInfo::where('user_id', $user['id'])->first();
        if($userInfo != null) $verified = true;

        return view('home',[
            'verified'=>$verified,
        ]);
    }



}
