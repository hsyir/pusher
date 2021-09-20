<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all(){
        return User::get(["id","email"]);
    }
    public function makeAdmin(User $user){
        $user->level=User::LEVEL_ADMIN;
        $user->save();
        return $user;
    }
}
