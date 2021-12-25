<?php

namespace App\Http\Controllers;

use App\Models\Stats;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $stats = Stats::where('user_id', $id)->first();
        if ($user == null) {
            return view('error');
        } else if ($user->id == Auth::id()) {
            return view('myProfile', [
                'user' => $user,
                'stats' => $stats
            ]);
        } else {
            return view('profile', [
                'user' => $user,
                'stats' => $stats
            ]);
        }
    }

    public function showPlayers($alert = 'none')
    {
        $user = User::all();

        return view('adminPanel', [
            'users' => $user,
            'alert' => $alert
        ]);
    }

    public function mute(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->is_muted = 1;
        $user->save();

        $alert = 'Użytkownik ' . $user->name . ' został zmutowany.';
        return $this->showPlayers($alert);
    }

    public function ban(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->is_banned = 1;
        $user->save();

        $alert = 'Użytkownik ' . $user->name . ' został zbanowany.';
        return $this->showPlayers($alert);
    }

    public function addModer(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->is_moderator = 1;
        $user->save();

        $alert = 'Użytkownik ' . $user->name . ' dostał prawa moderatora.';
        return $this->showPlayers($alert);
    }

    public function unmute(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->is_muted = 0;
        $user->save();

        $alert = 'Użytkownik ' . $user->name . ' został rozmutowany.';
        return $this->showPlayers($alert);
    }

    public function unban(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->is_banned = 0;
        $user->save();

        $alert = 'Użytkownik ' . $user->name . ' został rozbanowany.';
        return $this->showPlayers($alert);
    }

    public function removeModer(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->is_moderator = 0;
        $user->save();

        $alert = 'Użytkowniku ' . $user->name . ' zabrano prawa moderatora.';
        return $this->showPlayers($alert);
    }

    public function searchUser(Request $request){
        $users = DB::table('users')
            ->where('name', 'like', '%' . $request->input('search_request') . '%')
            ->orWhere('email', 'like', '%' . $request->input('search_request') . '%')
            ->get();

        $alert = 'none';

        return view('adminPanel', [
            'users' => $users,
            'alert' => $alert
        ]);
    }
}
