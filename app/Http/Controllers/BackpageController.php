<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class BackpageController extends Controller
{
    //个人客户
    public function personClient()
    {
        $users=User::showPersonal();
        return view('admin.users.person',compact('users'));
    }
    //专业客户
    public function societeClient(){
        $users=User::showSociete();
        return view('admin.users.societe',compact('users'));
    }
}
