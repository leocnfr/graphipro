<?php

namespace App\Http\Controllers;

use App\Pelliculage;
use Illuminate\Http\Request;

use App\Http\Requests;

class PelliculageController extends Controller
{
    //

    public function show()
    {
        return Pelliculage::all();
    }

    public function store(Request $request)
    {
        Pelliculage::create($request->all());
        return redirect()->back();
    }

	public function destroy($id)
	{
		Pelliculage::destroy($id);
    }
}
