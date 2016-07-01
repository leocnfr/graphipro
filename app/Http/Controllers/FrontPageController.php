<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontPageController extends Controller
{
    //
    public function index()
    {
        return view('graphipro.index');
    }

    public function login()
    {
        return view('graphipro.login');
    }

    public function register()
    {
        return view('graphipro.inscription');
    }
}
