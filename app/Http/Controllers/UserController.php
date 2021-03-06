<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function create(){
        return view('admin.users.create');
    }

    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

}
