<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShowUsersController extends Controller
{
    public function showFollowers(User $user)
    {
        return view('followers', [
            'user' => $user
        ]);
    }

    public function showFollowing(User $user)
    {
        return view('following', [
            'user' => $user
        ]);
    }

}
