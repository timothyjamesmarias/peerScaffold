<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Redirect;

class ProfileController extends Controller
{
    public function create(){
        /*
        $user = Auth::user();
        
        if ($user->address == ''){
            return Inertia::render('Profile/Create');        
        }
        else{
            return redirect()->route('dashboard');
        }
        */
    }

    public function edit(){
        return Inertia::render('Profile/Edit');
    }

    public function dashboard(){
        
        /*
        $user = Auth::user();
        if ($user->address == ''){
            return redirect()->route('profile.create');
        }
        else{
            return Inertia::render('Profile/Dashboard',[

            ]);
        }
        */

        return Inertia::render('Profile/Dashboard',[

        ]);

    }

    public function show(User $user){
        
        //get the user
        $user = User::find($user);

        return Inertia::render('Profile',[
            //return only the non comprimising information
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'avatar_path' => $user->avatar_path
            ]
        ]);
    }
}
