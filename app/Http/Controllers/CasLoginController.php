<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasLoginController extends Controller
{
    public function login(Request $request){

        print "you are" . cas()->user() . " and would like to return to " .$request->callback;


        //This has to be improved via Cas Attributes

        $user  = User::firstOrCreate(
            ['uid' =>  cas()->user()],
            [
                'email' => cas()->user() , // Todo Replace with cas attribute
                'name' => cas()->user(),
                'password' => 'fakepasssword',

            ]
        );

        Auth::loginUsingId($user->id);



        return redirect($request->callback);
    }
}
