<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BackpageController extends Controller
{
    //个人客户
    public function PersonClient()
    {
        return view('admin.users.person');
    }
    //专业客户
    public function SocieteClient(){
        return view('admin.users.societe');
    }
}
