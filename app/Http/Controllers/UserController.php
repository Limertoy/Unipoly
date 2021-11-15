<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if($user == null){
            return view('error');
        } else if ($user->id == Auth::id()){
            return view('myProfile', [
                'user' => $user
            ]);
        }
        else {
            return view('profile', [
                'user' => $user
            ]);
        }
    }
}
