<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function allusers(){
        if(Auth::user()->admin==1){
            $users = User::get();
            return view('welcome',['users'=>$users]);
        }
        else{
            return redirect("/");
        }
    }
}
