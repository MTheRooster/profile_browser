<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function userProfiles(User $user){
        return Profile::where('user_id',$user->id)->get();
    }
}
